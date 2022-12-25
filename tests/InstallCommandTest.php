<?php

namespace Ipimpat\Bootstream\Tests;

class InstallCommandTest extends TestCase
{

    /**
     * Tests installation of Bootstrap scaffolding into the application.
     *
     * @test
     */
    public function test_install(): void
    {
        // Run the install command
        $this->artisan('bootstream:install')
            ->expectsOutput('Bootstrap 5.2 scaffolding for Inertia installed successfully.')
            ->assertExitCode(0);

        // Assert new directories exists ...
        $this->assertDirectoryExists(resource_path('js'));
        $this->assertDirectoryExists(resource_path('sass'));
        $this->assertDirectoryExists(resource_path('views'));

        // Assert deleted directories does not exists
        $this->assertDirectoryDoesNotExist(resource_path('css'));

        // Assert build configuration was copied ...
        $this->assertFileEquals(__DIR__.'/../stubs/postcss.config.js', base_path('postcss.config.js'));
        $this->assertFileEquals(__DIR__.'/../stubs/vite.config.js', base_path('vite.config.js'));

        // Assert Blade views was copied ...
        $this->assertFileEquals(__DIR__.'/../stubs/resources/views/app.blade.php', resource_path('views/app.blade.php'));

        // Assert Javascripts was copied ...
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/app.js', resource_path('js/app.js'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/bootstrap.js', resource_path('js/bootstrap.js'));

        // Assert Sass styles was copied
        $this->assertFileEquals(__DIR__.'/../stubs/resources/sass/_borders.scss', resource_path('sass/_borders.scss'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/sass/_custom.scss', resource_path('sass/_custom.scss'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/sass/_variables.scss', resource_path('sass/_variables.scss'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/sass/app.scss', resource_path('sass/app.scss'));

        // Assert Vue components was copied
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/ActionMessage.vue', resource_path('js/Components/ActionMessage.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/ActionSection.vue', resource_path('js/Components/ActionSection.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/ApplicationLogo.vue',resource_path('js/Components/ApplicationLogo.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/ApplicationMark.vue', resource_path('js/Components/ApplicationMark.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/AuthenticationCard.vue', resource_path('js/Components/AuthenticationCard.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/AuthenticationCardLogo.vue', resource_path('js/Components/AuthenticationCardLogo.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/Banner.vue', resource_path('js/Components/Banner.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/Checkbox.vue', resource_path('js/Components/Checkbox.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/ConfirmationModal.vue', resource_path('js/Components/ConfirmationModal.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/ConfirmsPassword.vue', resource_path('js/Components/ConfirmsPassword.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/DangerButton.vue', resource_path('js/Components/DangerButton.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/DialogModal.vue', resource_path('js/Components/DialogModal.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/Dropdown.vue', resource_path('js/Components/Dropdown.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/DropdownLink.vue', resource_path('js/Components/DropdownLink.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/FormSection.vue', resource_path('js/Components/FormSection.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/InputError.vue', resource_path('js/Components/InputError.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/InputLabel.vue', resource_path('js/Components/InputLabel.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/Modal.vue', resource_path('js/Components/Modal.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/NavLink.vue', resource_path('js/Components/NavLink.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/PrimaryButton.vue', resource_path('js/Components/PrimaryButton.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/SecondaryButton.vue', resource_path('js/Components/SecondaryButton.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/SectionBorder.vue', resource_path('js/Components/SectionBorder.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/SectionTitle.vue', resource_path('js/Components/SectionTitle.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/TextInput.vue', resource_path('js/Components/TextInput.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Components/Welcome.vue', resource_path('js/Components/Welcome.vue'));

        // Assert Vue layouts was copied ...
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Layouts/AppLayout.vue', resource_path('js/Layouts/AppLayout.vue'));

        // Assert Vue pages was copied ...
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Dashboard.vue', resource_path('js/Pages/Dashboard.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/PrivacyPolicy.vue', resource_path('js/Pages/PrivacyPolicy.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/TermsOfService.vue', resource_path('js/Pages/TermsOfService.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Welcome.vue', resource_path('js/Pages/Welcome.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/API/Index.vue', resource_path('js/Pages/API/Index.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/API/Partials/ApiTokenManager.vue', resource_path('js/Pages/API/Partials/ApiTokenManager.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Auth/ConfirmPassword.vue', resource_path('js/Pages/Auth/ConfirmPassword.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Auth/ForgotPassword.vue', resource_path('js/Pages/Auth/ForgotPassword.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Auth/Login.vue', resource_path('js/Pages/Auth/Login.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Auth/Register.vue', resource_path('js/Pages/Auth/Register.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Auth/ResetPassword.vue', resource_path('js/Pages/Auth/ResetPassword.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Auth/TwoFactorChallenge.vue', resource_path('js/Pages/Auth/TwoFactorChallenge.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Auth/VerifyEmail.vue', resource_path('js/Pages/Auth/VerifyEmail.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Profile/Show.vue', resource_path('js/Pages/Profile/Show.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Profile/Partials/DeleteUserForm.vue', resource_path('js/Pages/Profile/Partials/DeleteUserForm.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue', resource_path('js/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue', resource_path('js/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Profile/Partials/UpdatePasswordForm.vue', resource_path('js/Pages/Profile/Partials/UpdatePasswordForm.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Profile/Partials/UpdateProfileInformationForm.vue', resource_path('js/Pages/Profile/Partials/UpdateProfileInformationForm.vue'));
    }

    /**
     * Tests installation of Bootstrap scaffolding with Teams support into the application.
     *
     * @test
     */
    public function test_install_with_teams_support(): void
    {
        // Run the install command with --teams option
        $this->artisan('bootstream:install --teams')
            ->expectsOutput('Bootstrap 5.2 scaffolding for Inertia installed successfully.')
            ->assertExitCode(0);

        // Assert Teams Vue pages was copied ...
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Teams/Create.vue', resource_path('js/Pages/Teams/Create.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Teams/Show.vue', resource_path('js/Pages/Teams/Show.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Teams/Partials/CreateTeamForm.vue', resource_path('js/Pages/Teams/Partials/CreateTeamForm.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Teams/Partials/DeleteTeamForm.vue', resource_path('js/Pages/Teams/Partials/DeleteTeamForm.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Teams/Partials/TeamMemberManager.vue', resource_path('js/Pages/Teams/Partials/TeamMemberManager.vue'));
        $this->assertFileEquals(__DIR__.'/../stubs/resources/js/Pages/Teams/Partials/UpdateTeamNameForm.vue', resource_path('js/Pages/Teams/Partials/UpdateTeamNameForm.vue'));
    }

}
