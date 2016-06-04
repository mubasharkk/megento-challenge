# megento-challenge
Magento Challenge for BettenReise.de


 You will create a simple extension for Magento 1.7.0.2.

> The extension will be displaying a block in a product display page (PDP) depending on certain rules - either to display some content for a specific product or for a specific category (plus subcategories).

> Rules to display the Block will be maintained in the database. There is no admin panel for this test.

- For every set of category and sku rules we will be able to set an html, cms page or PHTML block to show.
- If only the category is given, the given html block will be shown in all pdp's of that category's products.
- If category and SKU are given, then the given block will be shown only under the related product's PDP.  SKU can be only from Configurable Products.
- Given html block can be direct code with html tags, can be a phtml block ID or a cms static block id.
- Rules can be in two states: Activated and Deactivated
- If there are more than one blocks matching for the same product they should be listed with the order of the rules ID Desc.

> Evaluation of the code will be done by looking at functionality and code style.

> The extension must be provided as a pack which is installable.

