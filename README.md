# Neos CMS optimization of JPEGs for Google PageSpeed

[![Latest Stable Version](https://poser.pugx.org/vivomedia/neos-jpeg-pagespeed-optimization/v/stable)](https://packagist.org/packages/vivomedia/neos-jpeg-pagespeed-optimization)
[![Total Downloads](https://poser.pugx.org/vivomedia/neos-jpeg-pagespeed-optimization/downloads)](https://packagist.org/packages/vivomedia/neos-jpeg-pagespeed-optimization)
[![License](https://poser.pugx.org/vivomedia/neos-jpeg-pagespeed-optimization/license)](https://packagist.org/packages/vivomedia/neos-jpeg-pagespeed-optimization)

As [Google PageSpeed docs](https://developers.google.com/speed/docs/insights/OptimizeImages?hl=en) suggests to increase the Google PageSpeed, this Neos CMS plugin changes the sampling factor of images to 4:2:0 while resizing.

Works very well in addition to [moc/imageoptimizer](https://github.com/mocdk/MOC.ImageOptimizer).

**Supported Imagine drivers:**
* [Imagick](https://pecl.php.net/package/imagick) (ImageMagick)

## Install

Install with composer

```
composer require vivomedia/neos-jpeg-pagespeed-optimization 
```

If you want to change all already created images, you have to clear all thumbnails and the cache.
```
./flow media:clearthumbnails
./flow flow:cache:flush --force
```

## Configuration

If you want to disable the image optimization in development context, you can set up following configuration in your `/Configuration/Development/Settings.yaml`

```
VIVOMEDIA:
  GoogleAnalytics:
    JpegPagespeedOptimization:
      enabled: false
``` 

## TODO

Imgine drivers:
* [Gmagick](https://pecl.php.net/package/gmagick) (GraphicsMagick)
