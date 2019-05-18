<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = new \App\OrganizationGenInfo();
        $company->name = 'kh-works';
        $company->role_id = 1;
        $company->email = 'kh-works@gmail.com';
        $company->verified = 1;
        $company->email_token = base64_encode('kh-works@gmail.com');
        $company->password = Hash::make('123456');
        $company->save();

    }
}
