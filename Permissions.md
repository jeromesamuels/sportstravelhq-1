# Permissions

These are the set of permission groups and their access in relation to the system.


## Complications

Hotel Manager can have hotels outside of their assigned corporate account holder. This leaves two choices on implementation for handling this:

 - Allow Managers to create hotels and assign them to a separate corporate account.
 - Enforce hotel managers to only create hotels that own for the specific corporate account they are assigned to. The reason for this is that users are driven by emails and each hotel manager that is a part of a another corporate account, will mean they have an email address for each corporate account. So if a hotel manager needs to manage multiple hotels between multiple corporate accounts they need an account for each corporate account. They will need to log in/out to view the data between them. Down the line maybe allow linking accounts to switch between corporates easier rather than being forced to log in and then out.
 
Organizations are freely created, multiples of the same Organization name can exist as this system isn't locking anyone into a true ownership of the organization. This means multiple coaches will create separate accounts, probably not knowing is another coach within their organization has signed up.  Admins will need to merge organizations if the time comes. This is not needed now, but how these permissions and table relations are connected need to be thought out.  
 

## Group Hierarchy

The names of these groups are subject to change.

 - Super Admin
     - Customer Service
 - Corporate
     - Group Sales
        - Hotel Manager    
 - Organization  
    - Client     
        - Assistant
            - Authorized Signee
            - Authorized Payee 
            

### Super Admin

They can do everything.

 - Manage Corporate accounts and send invites to them to join
 - Manage
    - Corporate
    - Sales Group
    - Hotel Manager
    - Clients & Switch which account controls the Organization
    - Assistants
 - Trips
    - Every action that a hotel, coportate or client can do, admin can do too.
 - Invoices
    - Can see invoices and finance reports

### Customer Service

They can do everything, except see finance reports.

### Corporate

 - There is only one account linked to the corporate account. But they can add add sale group individuals.
 - Can see every trip submitted in the system
 - Can see every bid in the trip that one of their hotel managers have submitted. Its important that they only see bids within the corporate account and not be able to see bids from other corporate hotel accounts.
 - They cannot submit bids.
 - Can see all family of brands invoices and receipts
 - Can download rooming lists
 - Can edit hotel blackouts
 - Can see "Brand Reports"

### Sales Group

They can do everything corporate can except be the account holder of the corporate account.

### Hotel manager

Hotel managers are limited to the hotels they have created or given ownership of. The system needs to allow multiple hotels per manager account.

-  Can view RFP’s that is sent from their Corporate via shared url
 -  Can submit bids
 -  Can view all RFP’s received from their corporate (history)
 - Can enter actualized room count and room rate
 - Can generate invoices 
 - Can upload final billing receipts
 - Can download room lists
 - Can edit hotel blackouts
 - Can see “Hotel Reports"
 - Downloading rooming lists - of hotels they control


### Organization

An organization is just the account owner. They can create sub users, and those sub users can create sub sub users. They can do everything a client can do, but they are the sole account owner for the organization. Ownership can be transferred by account owner or admin.


### Client

 - View Trips - They can view any trip created by anyone in the organization
 - Create trips
 - Accept RFPs - If they accept an RFP the linked data must remain to the original trip creator
 - Compare RFPs
 - Hotel Agreement - From anyone in the organization
 - Upload Rooming List - From anyone in the organization


### Assistant

This type of account is for an extra layer of security for coaches that deal with a specific sport.

 - View Trips - Only the trips they have created
 - Create trips
 - Accept RFPs
 - Compare RFPs
 - Hotel Agreement - Only from trips they have created
 - Upload Rooming List - Only from trips they have created


### Authorized Signee

They can only see the hotel agreement document they need to sign. This will be a URL given and the URL will be signed.

### Authorized Payee

They can only see the credit card authorization document they need to sign. This will be a URL given and the URL will be signed.
