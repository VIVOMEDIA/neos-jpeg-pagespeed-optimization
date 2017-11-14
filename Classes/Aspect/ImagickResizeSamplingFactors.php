<?php
namespace VIVOMEDIA\GooglePageSpeed\JpegOptimization\Aspect;

use Neos\Flow\Annotations as FLOW;

/**
 * @Flow\Aspect
 */
class ImagickResizeSamplingFactors {

    /**
     *
     *
     * @Flow\Before("setting(Neos.Imagine.driver='Imagick') && method(Neos\Media\Domain\Model\Adjustment\ResizeImageAdjustment->resize())")
     */

    public function setImageSamplingFactors(\Neos\Flow\Aop\JoinPointInterface $joinPoint)
    {
        $image = $joinPoint->getMethodArgument('image');
        $image->getImagick()->setSamplingFactors(['2x2','1x1','1x1']);
        $joinPoint->setMethodArgument('image', $image);
    }
}
