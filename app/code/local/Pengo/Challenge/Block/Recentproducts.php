<?php

/**
 * Plantilla de apoyo que resuelve el reto 2 de Pengo Challenge bajo el esquema
 * de blocks en Magento.
 *
 * @author Jorge Esteban Aguero Alvarez
 * @package Pengo_Challenge
 */
class Pengo_Challenge_Block_Recentproducts extends Mage_Core_Block_Template
{
    /**
     * Obtiene los productos más recientes
     *
     * Regresa el identificador, nombre, url del producto, imagen, precio y
     * url para agregar al carrito de los productos más recientes.
     *
     * @return array
     */
    public function getRecentProducts()
    {
        // call model to fetch data
        $arr_products   = array();
        $products       = Mage::getModel("recentproducts/recentproducts")->getRecentProducts();
        
        foreach ($products as $product)
        {
            $arr_products[] = (object)array(
                'id'            => $product->getId(),
                'name'          => $product->getName(),
                'link_product'  => $product->getProductUrl(),
                'image'         => $product->getImageUrl(),
                'price'         => '$'. number_format($product->getPrice(), 2,".",""),
                'add_cart_url'  => Mage::helper('checkout/cart')->getAddUrl($product)
            );
        }
    
        return $arr_products;
    }
}
