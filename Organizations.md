# Organizations

Organizations have been added to allow multi-coordinator access to the same set of trips. The system is setup to eventually allow coordinators to belong to multiple organizations if needed.

## Upgrade to Laravel 5.8

Due to how Laravel Model events worked in previous versions you will need to upgrade Laravel 5.7 to Laravel 5.8. I have already updated the code to support this but you still need to do work on your end to upgrade the local packages.


### 1. Upgrade Packages

First we upgrade with the recent composer.json commit.

    php composer.phar update
    
If this fails you can try nuking the vendor and lock files. Then call `install` instead.

    rm -rf vendor/ composer.lock
    php composer.phar install


### 2. Run Migrations

Database changes have been made so be sure to run the migrations. Also I have migrated existing user records for coordinators to support organization, this way old data isn't causing errors.

    php artisan migrate
    
And thats it... but be sure to read the rest of the document to see how to work with organizations, coodinators and sub-coordinatos.

## How to add a user from the organization

There are two ways to assign a user to an organization. **However, both organization and user _MUST_ be created in advanced. Meaning both User and Organization records must have ID's**

You can either use the organization record and attach to the user.

    $organization->users()->attach($user->id);

Or from the user's record to attach an organization.

    $user->organizations()->attach($organization->id);

**Important, model events for attaching, detaching and sync requires Laravel 5.8, versions before this would not trigger model events.**

## How to remove a user from an organization

To remove a user just call detach from the organization record:

    $organization->users()->detach($user->id);


## How to get a coordinator versus a subcoordinator from an organization.

There are two helper queries that are setup provide an initial filter.

**Coordinators**

    $coordinators = $organization->coordinators;
    
**Sub Coordinators**

    $subcoordinators = $organization->subcoordinators;
    

If you need to expand on these filters, you can call them as a function i.e.

    $organization->coordinators()->where('first_name', 'John')->get();    
## How to get all trips within an organization

To get all trips from all coordinators within an organization you can just call trips directly from the organization. i.e

    $organization = Organization::find(64);
    $trips = $organization->trips;
    
If you need to call additional queries then call trips as a function i.e

    $organization = Organization::find(64);
    //-- Get all trips created in the last 30 days
    $trips = $organization->trips()->whereDate('added', '>', Carbon::now()->subDays(30))->get();

Since trips can be pulled from organizations, it also create a security barrier by preventing lookup of trips by coordinators that are outside the organization. For example:

    $coordinator_id = 24; // Lets say this coordinator does not belong to the organization below

    $organization = Organization::find(64);
    $trips = $organization->trips()->where('entry_by', $coordinator_id)->get();
    
    echo $trips->count(); // Trips would be empty because the coordinator does not belong to the organization.
    

## How to get the user's organization

While the system is setup to allow multi organizations from a user. It would be a pain to keep calling into all organisations to just fetch the first. So I have added a helper / cache of the organization for the user. i.e

    $user = Users::find(12);
    
    $organization = $user->organization;
    
    //-- If you want to get all organizations that the user is apart of then you can fall back to the pluralization version
    $organizations = $user->organizations;

## Permissions

### Check if user is in Organization

The primary way to check if a user has permissions to edit anything within an organization is to check their user id.

    $organization->hasUserId($user->id);

### Check if the user is a manager or subcoordinator

A client that just signs up is a manager and the account holder of the organization.

    if ($user->is_manager) {
        //-- do your manager stuff here....
    } else if ($user->is_subcoordinator) {
        //-- do you sub-coordinator stuff here
    }
    
### Check if the user is the organization's account holder

There is only ever one account holder per organization. Here is how to check if the user is the account holder.

    if ($organization->isAccountHolder($user->id)) {
        //-- do account holder stuff here
    }
