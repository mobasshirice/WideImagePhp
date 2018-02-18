<?php
	/**
 * @author Gasper Kozak
 * @copyright 2007-2011

    This file is part of WideImage.

    WideImage is free software; you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation; either version 2.1 of the License, or
    (at your option) any later version.

    WideImage is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Lesser General Public License for more details.

    You should have received a copy of the GNU Lesser General Public License
    along with WideImage; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

    * @package WideImage
  **/

	/**
	 * TTF font support class
	 *
	 * @package WideImage
	 */
	class WideImage_Font_TTF
	{
		public $face;
		public $size;
		public $color;
        public $bg;

		function __construct($face, $size, $color,$bg)
		{
			$this->face = $face;
			$this->size = $size;
			$this->color = $color;
            $this->bg = $bg;
		}

		/**
		 * Writes text onto an image
		 *
		 * @param WideImage_Image $image
		 * @param mixed $x smart coordinate
		 * @param mixed $y smart coordinate
		 * @param string $text
		 * @param int $angle Angle in degrees clockwise
		 */
		function writeText($image, $x, $y, $text2, $angle = 0)
		{
            $oldx=$x;
            $oldy=$y;
            $prevHeight=0;

            $line=(1.3)*$this->size;

            $txts = explode("\n", $text2);
            $n=sizeof($txts);

            $up=(($this->size*$n)+($line*($n-1)))/2-$this->size/2;

            $padding=(0.40)*$this->size;

            foreach($txts as $text) {


                //$text=$text2;

                $x=$oldx;
                $y=$oldy;

                if ($image->isTrueColor())
                    $image->alphaBlending(true);

                $box = imageftbbox($this->size, $angle, $this->face, $text);
                $obox = array(
                    'left' => min($box[0], $box[2], $box[4], $box[6]),
                    'top' => min($box[1], $box[3], $box[5], $box[7]),
                    'right' => max($box[0], $box[2], $box[4], $box[6])-1,
                    'bottom' => max($box[1], $box[3], $box[5], $box[7]) - 1
                );
                $obox['width'] = abs($obox['left']) + abs($obox['right']);
                $obox['height'] = abs($obox['top']) + abs($obox['bottom']);

                $x = WideImage_Coordinate::fix($x, $image->getWidth(), $obox['width']);
                $y = WideImage_Coordinate::fix($y, $image->getHeight(), $obox['height'])+$prevHeight-$up;


                $curHeight=$this->size +$line;

                $prevHeight+=$curHeight;

                $fixed_x = $x - $obox['left'];
                $fixed_y = $y - $obox['top'];

                $fixed_x1 = $x+$obox['width'];
                $fixed_y1 =  $y+$obox['height'];


                if($this->bg!=null)
                {
                    imagefilledrectangle($image->getHandle(), $x-$padding, $y-$padding, $fixed_x1+$padding , $fixed_y1+$padding , $this->bg);

                }


                imagettftext($image->getHandle(), $this->size, $angle, $fixed_x, $fixed_y, $this->color, $this->face, $text);

            }



		}
	}
