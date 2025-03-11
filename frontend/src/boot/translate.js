import { boot } from 'quasar/wrappers'
import { useLanguageStore } from 'stores/languageStore'

const language = useLanguageStore()
export default boot(({ app }) => {
    app.config.globalProperties.$translate = language.translate
    // app.config.globalProperties.$localization.direction = language.direction
    app.config.globalProperties.$localization = language
})
