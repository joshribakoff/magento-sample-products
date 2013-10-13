magento-sample-products
=======================

I had a need to create 100s or even 1,000s of Magento products for debugging purposes. This tool creates X number of products "product 1", "product 2", etc.. for the SKU/name for Magento testing purposes. Actually it creates a CSV full of sample products for importing into Magento.

Usage
=====
Call it on the command line as you would expect:

```
php create.php
```

It will write the output CSV to stdout, so feel free to pipe that to a file
```
php create.php > out.csv
```

You can then call Magento's import on that file to import the sample products into your Magento store.


You can specify the number of sample products to create
```
php create.php --number=100 > out.csv
```

It will use the default pricing/values from the seed.csv, except for SKU & name which are set to "skuN" and "product N" respectively, where N is an increasing number.
