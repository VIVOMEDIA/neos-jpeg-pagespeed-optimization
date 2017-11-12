<?php
namespace VIVOMEDIA\GooglePageSpeed\JpegOptimization\Aspect;

use TYPO3\Flow\Annotations as FLOW;

/**
 * @Flow\Aspect
 */
class ImagickResizeSamplingFactors {

    /**
     *
     *
     * @Flow\Before("setting(TYPO3.Imagine.driver='Imagick') && method(TYPO3\Media\Domain\Model\Adjustment\ResizeImageAdjustment->resize())")
     */

    public function setImageSamplingFactors(\TYPO3\Flow\Aop\JoinPointInterface $joinPoint)
    {
        $image = $joinPoint->getMethodArgument('image');
        $image->getImagick()->setSamplingFactors(['2x2','1x1','1x1']);
        $joinPoint->setMethodArgument('image', $image);
    }
}
