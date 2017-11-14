<?php
namespace VIVOMEDIA\GooglePageSpeed\JpegOptimization\Aspect;

use Neos\Flow\Annotations as FLOW;

/**
 * @Flow\Aspect
 */
class GmagickResizeSamplingFactors {

    /**
     *
     *
     * @Flow\Before("setting(Neos.Imagine.driver='Gmagick') && method(Neos\Media\Domain\Model\Adjustment\ResizeImageAdjustment->resize())")
     */

    public function setImageSamplingFactors(\Neos\Flow\Aop\JoinPointInterface $joinPoint)
    {
        $image = $joinPoint->getMethodArgument('image');
        $image->getGmagick()->setsamplingfactors([4,2,0]);
        $joinPoint->setMethodArgument('image', $image);
    }
}
