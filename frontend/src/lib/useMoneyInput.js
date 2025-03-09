import { computed, watchEffect, ref } from 'vue'

function parseCurrency(value, decimalSeparator, groupSeparator) {
    // Remove group separators
    let parsed = value.replace(new RegExp(`\\${groupSeparator}`, 'g'), '')
    // Replace decimal separator with dot
    parsed = parsed.replace(decimalSeparator, '.')
    // Remove any remaining non-digit characters except dots
    parsed = parsed.replace(/[^\d.]/g, '')
    // Handle multiple dots
    const parts = parsed.split('.')
    if (parts.length > 2) {
        parsed = parts[0] + '.' + parts.slice(1).join('')
    }
    // Parse to float, default to 0 if invalid
    const number = parseFloat(parsed)
    return isNaN(number) ? 0 : number
}

export function useMoneyInput(modelValue, emitUpdate, options) {
    const locale = options.locale
    const currency = options.currency
    const precision = options.precision

    const formatter = ref(null)
    const decimalSeparator = ref('.')
    const groupSeparator = ref(',')
    const rawValue = ref('')

    watchEffect(() => {
        formatter.value = new Intl.NumberFormat(locale.value, {
            style: 'currency',
            currency: currency.value,
            minimumFractionDigits: precision.value,
            maximumFractionDigits: precision.value,
        })

        // Determine decimal and group separators
        const sample = 1234.56
        const parts = formatter.value.formatToParts(sample)
        parts.forEach(part => {
            if (part.type === 'decimal') decimalSeparator.value = part.value
            if (part.type === 'group') groupSeparator.value = part.value
        })
    })

    const displayValue = computed({
        get: () => {
            return formatter.value?.format(modelValue.value) || ''
        },
        set: newValue => {
            rawValue.value = newValue
            const number = parseCurrency(
                newValue,
                decimalSeparator.value,
                groupSeparator.value,
            )
            emitUpdate(number)
        },
    })

    const onBlur = () => {
        // Force reformat on blur to ensure proper formatting
        displayValue.value = formatter.value.format(modelValue.value)
    }

    return {
        displayValue,
        onBlur,
    }
}
