<?php

    class CartProduct{
        private $productID;
        private $productName;
        private $imgFileName;

        public function __construct($productData)
        {
            $this -> productID = $productData["ProductID"];
            $this -> productName = $productData["ProductName"];
            $this -> imgFileName = $productData["ImgFileName"];
        }

        function getProductID()
        {
            return $this -> productID;
        }

        function getProductName()
        {
            return $this -> productName;
        }

        function getImgFileName()
        {
            return $this -> imgFileName;
        }
    }

?>