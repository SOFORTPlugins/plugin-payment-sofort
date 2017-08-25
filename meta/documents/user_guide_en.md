<div class="alert alert-warning" role="alert">
   <strong><i>Note:</i></strong> The SOFORT plugin has been developed for use with the online store Ceres and only works with its structure or other template plugins. 
</div>

# SOFORT - Easy Online payments for plentymarkets Online-Shops

With SOFORT for plentymarkets you can add **SOFORT** as a payment method to your online shop.

## Creating a SOFORT account

You need to register at our [Merchant Portal](https://www.sofort.com/payment/users/register) before you are able to use SOFORT as a payment method. After registration you will receive the correct information and credentials needed to install and configure the payment method. 

## Installing SOFORT in plentymarkets

Before using SOFORT-Plugins, you need to install the module from the Git or plentyMarketplace.**Installing SOFORT-Plugin via GIT:**

1. Open the Menu Plugins **» Git**2.	Click on **New Plugin**. The frame **Settings** will open3.	Connect to your Github Account by filling in **User Name** and **Password** 4.	Fill the Remote URL of the SOFORT-Plugin5.	Select **Auto fetch**6.	Then click on **Save**

**Installing SOFORT-Plugin via plentyMarketplace:**

1. Open [plentyMarketplace](https://marketplace.plentymarkets.com/) in your browser
2. Select the SOFORT plugin under **Payment** → **SOFORT**
3. Choose **Go to checkout** (login) and purchase
4. Go to plentymarkets shop backend
5. Click on the Menu Plugin **» Purchases**
6. Press **Install**

## Configuring SOFORT in plentymarkets

Before using SOFORT-Plugins, you need to connect your SOFORT-account with your plentymarkets-system.

##### connecting to the SOFORT-account:
  
1. Open the menu **Plugins » Plugin overview**.
2. Click on **SOFORT** Plugin and choose **Configuration**.
3. Type in the configuration key 
	→ You receive the configuration key after successful registration as a Merchant.
4. Other additional configurations can be set up in the Menu **Extended Settings**.
5. On the Left Menu **Merchant**, you can set up your Bank Account Details.
6. Save the configurations.

<table>
  <caption>Tab. 1: SOFORT Plugin Settings / Base Settings</caption>
  <thead>
    <th>
      Setting
    </th>
    <th>
      Explanation
    </th>
  </thead>
  <tbody>
    <tr>
      <td>
        <b>Activate SOFORT</b>
      </td>
      <td><b>Default:</b> <i>No</i>
      </td>
    </tr>
    <tr>
      <td>
        <b>Configuration key</b>
      </td>
      <td><strong><i>Important:</i></strong> You'll receive the configuration key after registration (https://www.sofort.com/payment/users/register). <br />Without input the payment method won't be active.
      </td>
    </tr>
  </tbody>
</table>

<table>
  <caption>Tab. 2: SOFORT Plugin Settings / Extended Settings</caption>
  <thead>
    <th>
      Setting
    </th>
    <th>
      Explanation
    </th>
  </thead>
  <tbody>
    <tr>
      <td>
        <b>Logo (size)</b>
      </td>
      <td>
        Choose the desired display size of the logo. <strong><i><br />Important: </i></strong>The view in the frontend depends on the Template Plugin. Potentially the size of the logo isn't changed there.
        <br /><b>Default:</b> <i>100x38</i>
      </td>
    </tr>
    <tr>
      <td>
        <b>Recommended payment method</b>
      </td>
      <td>
        The Payment method name will be extended with "recommended payment method".
        <br /><b>Default:</b> <i>Yes</i>
      </td>
    </tr>
    <tr>
      <td>
        <b>Reason (line 1) *Mandatory</b>
      </td>
      <td>
        Sets up the reason for the bank transfer (max. 27 chars - special chars will be replaced/removed). The following placeholders are allowed:<br />
        {{transaction_id}} => Transaction-ID<br />
        {{customer_name}} => Name of the customer<br />
        {{customer_email}} => E-Mail address of the customer<br />
        <b>Default:</b> <i>{{transaction_id}}</i>
      </td>
    </tr>
    <tr>
      <td>
        <b>Reason (line 2)</b>
      </td>
      <td>
        <i>refer Reason 1</i><br />
        Additionally following placeholders are possible:<br />
        {{customer_id}} => Customer-ID<br />
        {{customer_company}} => Company name of the customer<br />
        <b>Default:</b> <i>-</i>
      </td>
    </tr>
  </tbody>
</table>

<table>
  <caption>Tab. 3: SOFORT Plugin Settings / Merchant</caption>
  <thead>
    <th>
      Einstellung
    </th>
    <th>
      Erläuterung
    </th>
  </thead>
  <tbody>
    <tr>
      <td>
        <b>Recipient holder</b>
      </td>
      <td>
        Merchant depositor
        <br /><b>Default:</b> -
      </td>
    </tr>
    <tr>
      <td>
        <b>IBAN</b>
      </td>
      <td>
        Merchant IBAN	
        <br /><b>Default:</b> -
      </td>
    </tr>
    <tr>
      <td>
        <b>BIC</b>
      </td>
      <td>
        Merchant BIC
        <br /><b>Default:</b> -
      </td>
    </tr>
  </tbody>
</table>

## administrate payment methods

In this chapter you will find out, how to offer the payment methods in your webshop.

### activate SOFORT

After installing SOFORT-Plugin, you need to activate the plugin in the main configuration and at least set the configuration key. Afterwards SOFORT ist available without any further adjustments. This payment method appears depending on the priority settings next to other activated payment methods.

## automatic refunds of SOFORT payments

Set an event to activate automatic refunds via SOFORT.

##### Set up event procedure:

1. open the menu **Plugins » Plugin overview**.
2. Click on the Plugin **SOFORT** and edit **Configuration**.
3. type in your banking details in slide **Merchant**.
4. open the menu **Settings » Orders » Event procedures**.
5. Click on **Add event procedure**.
→ a window **Create new event procedure** will be opened.
6. type in a name.
7. select event according to table 4.
8. **Save** this settings.
9. take setting according to table 4.
10. Choose hook at **Active**.
11. **Save** this settings.

<table>
  <thead>
    <th>
      Setting
    </th>
    <th>
      Option
    </th>
    <th>
      Selection
    </th>
  </thead>
  <tbody>
    <tr>
      <td><strong>Event</strong></td>
      <td><strong>Select the event according to which a refund is to be made.</strong></td>
      <td></td>
    </tr>
    <tr>
      <td><strong>Filter 1</strong></td>
      <td><strong>Order > Payment method</strong></td>
      <td><strong>Plugin: SOFORT</strong></td>
    </tr>
    <tr>
      <td><strong>Action</strong></td>
      <td><strong>Plugin > Refund of SOFORT Payment</strong></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
  <caption>
    Tab. 4: Event procedure for automatic refunds of SOFORT payments
  </caption>
</table>