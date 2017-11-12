<?php
namespace VIVOMEDIA\GooglePageSpeed\JpegOptimization\Aspect;

use TYPO3\Flow\Annotations as FLOW;

/**
 * @Flow\Aspect
 */
class GmagickResizeSamplingFactors {

    /**
     *
     *
     * @Flow\Before("setting(TYPO3.Imagine.driver='Gmagick') && method(TYPO3\Media\Domain\Model\Adjustment\ResizeImageAdjustment->resize())")
     */

    public function setImageSamplingFactors(\TYPO3\Flow\Aop\JoinPointInterface $joinPoint)
    {
        $image = $joinPoint->getMethodArgument('image');
        $image->getGmagick()->setsamplingfactors([4,2,0]);
        $joinPoint->setMethodArgument('image', $image);
    }
}
