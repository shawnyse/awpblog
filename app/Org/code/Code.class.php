<?php

namespace App\Org\code;

use Session;

//Draw the verification code
class Code
{

    //resource
    private $img;
    //Canvas width
    private $width = 100;
    //Canvas height
    private $height = 30;
    //background colour
    private $bgColor = '#ffffff';
    //Verification code
    private $code;
    //Random seed of verification code
    private $codeStr = '23456789abcdefghjkmnpqrstuvwsyz';
    //the length of Verification code
    private $codeLen = 4;
    //the font of verification code
    private $font;
    private $fontSize = 16;
    private $fontColor = '';

    public function __construct()
    {
    }

    //create verification code
    public function make()
    {
        if (empty($this->font)) {
            $this->font = __DIR__ . '/consola.ttf';
        }
        $this->create();//generate verification code
        header("Content-type:image/png");
        imagepng($this->img);
        imagedestroy($this->img);
        //exit;
    }

    //font file
    public function font($font)
    {
        $this->font = $font;
        return $this;
    }

    public function fontSize($fontSize)
    {
        $this->fontSize = $fontSize;
        return $this;
    }

    public function fontColor($fontColor)
    {
        $this->fontColor = $fontColor;
        return $this;
    }

    //the number of verification code
    public function num($num)
    {
        $this->codeLen = $num;
        return $this;
    }

    public function width($width)
    {
        $this->width = $width;
        return $this;
    }

    public function height($height)
    {
        $this->height = $height;
        return $this;
    }

    public function background($color)
    {
        $this->bgColor = $color;
        return $this;
    }

    //return verification code
    public function get()
    {
//		return $_SESSION['code'];
        return session('code');
    }

    //generate verification code
    private function createCode()
    {
        $code = '';
        for ($i = 0; $i < $this->codeLen; $i++) {
            $code .= $this->codeStr [mt_rand(0, strlen($this->codeStr) - 1)];
        }
        $this->code = strtoupper($code);
        // dd($this->code);
        Session::put('code', $this->code);
        // session(['code' => $this->code]);
//		$_SESSION['code'] = $this->code;
    }

    //create canvas
    private function create()
    {
        if (!$this->checkGD())
            return false;
        $w = $this->width;
        $h = $this->height;
        $bgColor = $this->bgColor;
        $img = imagecreatetruecolor($w, $h);
        $bgColor = imagecolorallocate($img, hexdec(substr($bgColor, 1, 2)), hexdec(substr($bgColor, 3, 2)), hexdec(substr($bgColor, 5, 2)));
        imagefill($img, 0, 0, $bgColor);
        $this->img = $img;
        $this->createLine();
        $this->createFont();
        $this->createPix();
        $this->createRec();
    }

    //draw lines
    private function createLine()
    {
        $w = $this->width;
        $h = $this->height;
        $line_color = "#dcdcdc";
        $color = imagecolorallocate($this->img, hexdec(substr($line_color, 1, 2)), hexdec(substr($line_color, 3, 2)), hexdec(substr($line_color, 5, 2)));
        $l = $h / 5;
        for ($i = 1; $i < $l; $i++) {
            $step = $i * 5;
            imageline($this->img, 0, $step, $w, $step, $color);
        }
        $l = $w / 10;
        for ($i = 1; $i < $l; $i++) {
            $step = $i * 10;
            imageline($this->img, $step, 0, $step, $h, $color);
        }
    }

    //draw outlines
    private function createRec()
    {
        //imagerectangle($this->img, 0, 0, $this->width - 1, $this->height - 1, $this->fontColor);
    }

    //write letters
    private function createFont()
    {
        $this->createCode();
        $color = $this->fontColor;
        if (!empty($color)) {
            $fontColor = imagecolorallocate($this->img, hexdec(substr($color, 1, 2)), hexdec(substr($color, 3, 2)), hexdec(substr($color, 5, 2)));
        }
        $x = ($this->width - 10) / $this->codeLen;
        for ($i = 0; $i < $this->codeLen; $i++) {
            if (empty($color)) {
                $fontColor = imagecolorallocate($this->img, mt_rand(50, 155), mt_rand(50, 155), mt_rand(50, 155));
            }
            imagettftext($this->img, $this->fontSize, mt_rand(-30, 30), $x * $i + mt_rand(6, 10), mt_rand($this->height / 1.3, $this->height - 5), $fontColor, $this->font, $this->code [$i]);
        }
        $this->fontColor = $fontColor;
    }

    //draw lines
    private function createPix()
    {
        $pix_color = $this->fontColor;
        for ($i = 0; $i < 50; $i++) {
            imagesetpixel($this->img, mt_rand(0, $this->width), mt_rand(0, $this->height), $pix_color);
        }

        for ($i = 0; $i < 2; $i++) {
            imageline($this->img, mt_rand(0, $this->width), mt_rand(0, $this->height), mt_rand(0, $this->width), mt_rand(0, $this->height), $pix_color);
        }
        //draw round
        for ($i = 0; $i < 1; $i++) {
            // line width
            imagearc($this->img, mt_rand(0, $this->width), mt_rand(0, $this->height), mt_rand(0, $this->width), mt_rand(0, $this->height)
                , mt_rand(0, 160), mt_rand(0, 200), $pix_color);
        }
        imagesetthickness($this->img, 1);
    }

    //Validate GD Library
    private function checkGD()
    {
        return extension_loaded('gd') && function_exists("imagepng");
    }

}
