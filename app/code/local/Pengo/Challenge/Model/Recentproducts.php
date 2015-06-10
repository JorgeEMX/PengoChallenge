<?php

/**
 * Modelo de apoyo que resuelve el reto 2 de Pengo Challenge bajo el esquema
 * de blocks en Magento.
 *
 * @author Jorge Esteban Aguero Alvarez
 * @package Pengo_Challenge
 */
class Pengo_Challenge_Model_Recentproducts extends Mage_Core_Model_Abstract
{
    /**
     * Obtiene los productos más recientes
     *
     * Obtiene los últimos 3 productos agregados a la tienda
     *
     * @return array
     */
    public function getRecentProducts()
    {
        $products = Mage::getModel('catalog/product')
                    ->getCollection()
                    ->addAttributeToSelect('*')
                    ->addAttributeToSort('created_at', 'DESC')
                    ->setPageSize(3)
                    ->setCurPage(1);
        return $products;
    }
}
