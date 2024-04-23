<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends MY_Model
{
    protected $_table_gallery;
    public function __construct()
    {
        parent::__construct();
        $this->_table = 'products';
        $this->_table_gallery = 'galleries';
        $this->_alias = 'alias';
    }

    /**
     * function get kho ảnh của 
     * @author dinhtv
     * @since 11/03/2023
     */
    public function get_gallery($productId, $optional = [])
    {
        return $this->get_data(
            [
                'where' => array_merge(
                    [
                        'product_id' => $productId,
                    ],
                    $optional
                )
            ],
            RETURN_TYPE_OBJECT,
            $this->_table_gallery
        );
    }

    /**
     * function get a single image of product
     * @author dinhtv
     * @since 11/03/2023
     */
    public function get_a_image($imageId)
    {
        return $this->get_by_id($imageId, '*', $this->_table_gallery);
    }

    /**
     * function lưu kho ảnh của 
     * @author dinhtv
     * @since 11/03/2023
     */
    public function save_gallery($insertData)
    {
        return $this->save($insertData, $this->_table_gallery);
    }

    /**
     * function lưu kho ảnh của 
     * @author dinhtv
     * @since 11/03/2023
     */
    public function delete_image($id)
    {
        return $this->hard_delete($id, $this->_table_gallery);
    }
}
