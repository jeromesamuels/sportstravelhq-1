# Sports Travel HQ

Hooking hotels for sports teams made easy. Hotel Search, Proposals, Contract Signing, Rooming List. All Online, All in One Place

## How to install

Setup configuration file first. You will need to read through the ENV to setup the application correctly.

    cp .env.example .env
    php composer.phar install

Then run migration and seeding
    
    php artisan migrate
    php artisan db:seed

If you want to use the hotel contract, compile the application with node. First install packages:

    npm i
    
Then run the webpack build. Please note one is for development the other is production.

    # For development
    npm run agreement-dev
    
    # For production
    npm run agreement-build
    
Additional install instructions are available inside INSTALL.md specific to the hotel agreement.
