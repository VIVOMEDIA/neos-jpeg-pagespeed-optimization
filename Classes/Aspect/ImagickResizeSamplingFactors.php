<?php
namespace VIVOMEDIA\GooglePageSpeed\JpegOptimization\Aspect;

use Imagine\Image\ImagineInterface;
use Neos\Flow\Annotations as FLOW;

/**
 * @Flow\Aspect
 */
class ImagickResizeSamplingFactors {

    /**
     * @var ImagineInterface
     * @Flow\Inject(lazy = false)
     */
    protected $imagineService;

    /**
     *
     *
     * @Flow\AfterReturning("setting(Neos.Imagine.driver='Imagick') && setting(VIVOMEDIA.GoogleAnalytics.JpegPagespeedOptimization.enabled) && method(Neos\Media\Domain\Model\Thumbnail->refresh())")
     */

    public function setImageSamplingFactors(\Neos\Flow\Aop\JoinPointInterface $joinPoint)
    {
        /** @var \Neos\Media\Domain\Model\Thumbnail $thumbnail */
        $thumbnail = $joinPoint->getProxy();
        $thumbnailResource = $thumbnail->getResource();
        if (!$thumbnailResource) {
            return;
        }

        $streamMetaData = stream_get_meta_data($thumbnailResource->getStream());
        $pathAndFilename = $streamMetaData['uri'];

        $imageType = $thumbnailResource->getMediaType();
        switch ($imageType) {
            case 'image/jpeg':
                $imagineImage = $this->imagineService->open($pathAndFilename);
                $imagineImage->getImagick()->setSamplingFactors(['2x2','1x1','1x1']);
                $imagineImage->save();
            break;
        }
    }
}
