<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionGroupsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(RolePermissionsTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(LanguageWordsTableSeeder::class);
        $this->call(BackupHistoriesTableSeeder::class);
        $this->call(BranchesTableSeeder::class);
        $this->call(FailedJobsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(JobsTableSeeder::class);
        $this->call(LoginLogsTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
        $this->call(PasswordResetTokensTableSeeder::class);
        $this->call(PersonalAccessTokensTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(WebsocketsStatisticsEntriesTableSeeder::class);
        $this->call(UserProfilesTableSeeder::class);
        $this->call(CountryProvincesTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(SystemConfigurationsTableSeeder::class);
        $this->call(FinancingModesTableSeeder::class);
        $this->call(FilesTableSeeder::class);
        $this->call(FinanceModeRequestStepsTableSeeder::class);
        $this->call(RequestStepFieldsTableSeeder::class);
        $this->call(AssetTypesTableSeeder::class);
        $this->call(CustomerDetailsTableSeeder::class);
        $this->call(MurabehaRequestsTableSeeder::class);
        $this->call(CustomerAssetsTableSeeder::class);
    }
}
