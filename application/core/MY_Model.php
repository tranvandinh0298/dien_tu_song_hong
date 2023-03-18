<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * MY_Model
 * dev: dinhtv
 * createdDate: 23/2/2022
 * updatedDate: 16/05/2022
 */
class MY_Model extends CI_Model
{
    protected $_table;
    protected $_key;
    protected $_alias;
    protected $_order;
    public function __construct()
    {
        $this->load->database();
        parent::__construct();
        $this->_key = 'id';
        $this->_alias = '';
        $this->_order = ["id" => "ASC"];
    }

    /**
     * function get row by primary key
     * @author dinhtv
     * @param int $id: primary key
     * @param string|array $select
     * @param string|null $table
     * @return object
     * createdDate: 23/2/2022
     * updatedDate: 04/02/2023
     */
    public function get_by_id($id, $select = "*", $table = NULL)
    {
        if (empty($table)) $table = $this->_table;
        // select
        $this->db->select($select);
        // from
        $this->db->from($table);
        // where
        $this->_where([$this->_key => $id], $table);
        // get
        $row = $this->db->get()->row();
        // log_message('error', $this->db->last_query());
        return !empty($row) ? $row : false;
    }
    /**
     * function get row by alias
     * @author dinhtv
     * @param string $alias: trường định danh của bản ghi khác ngoài id
     * @param string|array $select
     * @param string|null $table
     * @return object
     * createdDate: 23/2/2022
     * updatedDate: 04/02/2023
     */
    public function get_by_alias($alias, $select = "*", $table = NULL, $optionalWhere = [])
    {
        if (empty($table)) $table = $this->_table;
        // select
        $this->db->select($select);
        // from
        $this->db->from($table);
        // where
        $this->_where(array_merge([$this->_alias => $alias], $optionalWhere), $table);
        // get
        $row = $this->db->get()->row();
        log_message('error', $this->db->last_query());
        return $row;
    }
    /**
     * function get data
     * @author dinhtv
     * @param array $params
     * @param string $returnType
     * @param string|null $table
     * @return object|array
     * createdDate: 16/05/2022
     * updatedDate: 08/02/2023
     */
    public function get_data($params = [], $returnType = RETURN_TYPE_OBJECT, $table = null)
    {
        // log_message('error',json_encode($params));
        $list = NULL;
        $select = '*';
        $arrSearch = $arrNot = $arrSort = $arrLike = [];
        $offset = $limit = 0;

        if (empty($table)) $table = $this->_table;
        if (!empty($params['select'])) $select = $params['select'];
        if (!empty($params['where'])) $arrSearch = $params['where'];
        if (!empty($params['notWhere'])) $arrNot = $params['notWhere'];
        if (!empty($params['like'])) $arrLike = $params['like'];
        if (!empty($params['sort'])) $arrSort = $params['sort'];
        if (!empty($params['offset'])) $offset = $params['offset'];
        if (!empty($params['limit'])) $limit = $params['limit'];

        // select
        $this->db->select($select);
        // from
        $this->db->from($table);
        // where
        $this->_where($arrSearch, $table);
        $this->_not_where($arrNot, $table);
        // like
        $this->_like($arrLike, $table);
        // sort
        $this->_order_by($arrSort, $table);
        // offset
        if (!empty($offset)) $this->db->offset($offset);
        // limit
        if (!empty($limit)) $this->db->limit($limit);
        // get
        $list = $this->db->get();
        switch ($returnType) {
            case RETURN_TYPE_OBJECT:
                $list = $list->result();
                break;
            case RETURN_TYPE_ARRAY:
                $list = $list->result_array();
                break;
            case RETURN_TYPE_FIRST:
                $list = $list->row();
                break;
            default:
                $list = $list->result();
                break;
        }
        log_message('error', $this->db->last_query());
        return $list;
    }

    /**
     * function count data
     * @author: dinhtv
     * @param array $params
     * @param string|null $table
     * @return int
     * createdDate: 16/05/2022
     * updatedDate: 08/02/2023
     */
    public function count_data($params = [], $table = NULL)
    {
        $count = 0;
        $arrSearch = $arrNot = $arrLike = [];

        if (empty($table)) $table = $this->_table;
        if (!empty($params['where'])) $arrSearch = $params['where'];
        if (!empty($params['notWhere'])) $arrNot = $params['notWhere'];
        if (!empty($params['like'])) $arrLike = $params['like'];
        // from
        $this->db->from($table);
        // where
        $this->_where($arrSearch, $table);
        $this->_not_where($arrNot, $table);
        // like
        $this->_like($arrLike);
        // count
        $count = $this->db->get()->num_rows();
        // log_message('error', $this->db->last_query());
        return $count;
    }

    /**
     * function kiểm tra xem bản ghi có tồn tại hay không
     * @author: dinhtv
     * @param array $where
     * @param string|null $table
     * @return bool
     * createdDate: 23/2/2022
     * updatedDate: 02/02/2023 
     */
    public function check_if_exist($where, $table = NULL)
    {
        if (empty($table)) $table = $this->_table;
        // from
        $this->db->from($table);
        // where
        $this->_where($where, $table);
        // count
        $count = $this->db->get()->num_rows();
        // log_message('error', $this->db->last_query());
        return ($count > 0) ? TRUE : false;
    }

    /**
     * function lưu bản ghi
     * @author: dinhtv
     * @param array $data;
     * @param string|null $table
     * @return int|bool
     * createdDate: 23/2/2022
     * updatedDate: 02/02/2023
     */
    public function save($data, $table = NULL)
    {
        $insertData = [];
        $insertedId = NULL;
        if (empty($table)) $table = $this->_table;
        $insertData = $this->check_if_column_exists($data, $table);
        // start sql
        $this->_strict_mode_start();
        // insert
        $this->db->insert($table, $insertData);
        $insertedId = $this->db->insert_id();
        // end sql
        log_message('error', $this->db->last_query());
        return $this->_strict_mode_end(['insertedId' => $insertedId]);
    }

    /**
     * function lưu bản ghi số lượng lớn
     * @author: dinhtv
     * @param array $data;
     * @param string|null $table
     * @return int|bool
     * createdDate: 08/02/2023
     * updatedDate: 08/02/2023
     */
    public function save_mass($data, $table = NULL)
    {
        if (empty($table)) $table = $this->_table;
        // start sql
        $this->_strict_mode_start();
        // insert
        $this->db->insert_batch($table, $data);
        // end sql
        // log_message('error', $this->db->last_query());
        return $this->_strict_mode_end();
    }

    /**
     * function cập nhật 1 trường của bản ghi
     * @author: dinhtv
     * @param int|array $id
     * @param string $field
     * @param mixed $value
     * @param null|string $table
     * @return bool
     * createdDate: 23/2/2022
     * updatedDate: 02/02/2023
     */
    public function update_field($id, $field, $value, $table = NULL)
    {
        $updateData = [];
        if (empty($table)) $table = $this->_table;
        $updateData = $this->check_if_column_exists([$field => $value], $table);
        // start sql
        $this->_strict_mode_start();
        // where
        $this->_where([$this->_key => $id], $table);
        // update
        $this->db->update($table, $updateData);
        // end sql
        log_message('error', $this->db->last_query());
        return $this->_strict_mode_end();
    }

    /**
     * function cập nhật nhiều trường của 1 bản ghi
     * @author: dinhtv
     * @param int|array $id
     * @param array $data
     * @param null|string $table
     * @return bool
     * createdDate: 23/2/2022
     * updatedDate: 02/02/2023
     */
    public function update_fields($id, $data, $table = NULL)
    {
        $updateData = [];
        if (empty($table)) $table = $this->_table;
        $updateData = $this->check_if_column_exists($data, $table);
        // start sql
        $this->_strict_mode_start();
        // where
        $this->_where([$this->_key => $id], $table);
        // update
        $this->db->update($table, $updateData);
        // end sql
        log_message('error', $this->db->last_query());
        return $this->_strict_mode_end();
    }

    /**
     * function cập nhật nhiều trường của nhiều bản ghi
     * @author: dinhtv
     * @param array $where
     * @param array $data
     * @param null|string $table
     * @return bool
     * createdDate: 23/2/2022
     * updatedDate: 02/02/2023
     */
    public function update_fields_where($where, $data, $table = NULL)
    {
        $updateData = [];
        if (empty($table)) $table = $this->_table;
        $updateData = $this->check_if_column_exists($data, $table);
        // start sql
        $this->_strict_mode_start();
        // where
        $this->_where($where, $table);
        // update
        $this->db->update($table, $updateData);
        // end sql
        log_message('error', $this->db->last_query());
        return $this->_strict_mode_end();
    }

    /**
     * function xóa cứng 1 bản ghi
     * @author: dinhtv
     * @param int @id
     * @param null|string $table
     * @return bool
     * createdDate: 23/2/2022
     * updatedDate: 23/2/2022
     */
    public function hard_delete($id, $table = NULL)
    {
        if (empty($table)) $table = $this->_table;
        // start sql
        $this->_strict_mode_start();
        // where
        $this->_where([$this->_key => $id], $table);
        // delete
        $this->db->delete($table);
        // end sql
        log_message('error', $this->db->last_query());
        return $this->_strict_mode_end();
    }

    /**
     * function remove non-existed column in params
     * @author: dinhtv
     * @param array $arr
     * @param null|string $table
     * @return array
     * createdDate: 16/05/2022
     * updatedDate: 16/05/2022
     */
    public function check_if_column_exists($arr = [], $table = NULL)
    {
        if (empty($table)) $table = $this->_table;
        if (is_array($arr) && !empty($arr)) {
            foreach ($arr as $field => $value) {
                $field = explode(' ', $field)[0];
                if (!$this->db->field_exists($field, $table)) {
                    // log_message('error', $this->db->last_query());
                    unset($arr[$field]);
                }
            }
        }
        return $arr;
    }

    /**
     * function _where
     * @author dinhtv
     * @param array $arrSearch
     * @param bool $whereIn: TRUE -> tìm bản ghi theo điều kiện, 
     *                       false -> tìm bản ghi nằm ngoài điều kiện
     * @return void
     * createdDate: 02/02/2023
     * updatedDate: 02/02/2023
     */
    protected function _where($arrSearch = [], $table = NULL)
    {
        if (empty($table)) $table = $this->_table;
        $where = $this->check_if_column_exists($arrSearch, $table);
        if (!empty($where)) {
            foreach ($where as $field => $value) {
                if (is_array($value)) $this->db->where_in($field, $value);
                else  $this->db->where($field, $value);
            }
        }
    }

    /**
     * function _not_where
     * @author dinhtv
     * @param array $arrSearch
     * @return void
     * createdDate: 02/02/2023
     * updatedDate: 02/02/2023
     */
    protected function _not_where($arrSearch = [], $table = NULL)
    {
        if (empty($table)) $table = $this->_table;
        $notWhere = $this->check_if_column_exists($arrSearch, $table);
        if (!empty($notWhere)) {
            foreach ($notWhere as $field => $value) {
                if (is_array($value)) $this->db->where_not_in($field, $value);
                else  $this->db->where($field . " != ", $value);
            }
        }
    }

    /**
     * function _order_by
     * @author dinhtv
     * @param array $arrSort
     * @return void
     * createdDate: 02/02/2023
     * updatedDate: 02/02/2023
     */
    protected function _order_by($arrSort = [], $table = NULL)
    {
        if (empty($table))
            $table = $this->_table;
        if (empty($arrSort))
            $arrSort = $this->_order;
        $orderBy = $this->check_if_column_exists($arrSort, $table);
        if (!empty($orderBy)) {
            foreach ($orderBy as $field => $value) {
                $this->db->order_by($field, $value);
            }
        }
    }

    /**
     * function _strict_mode_start
     * @author dinhtv
     * @return void
     * createdDate: 02/02/2023
     * updatedDate: 02/02/2023
     */
    protected function _strict_mode_start()
    {
        $this->db->trans_start();
    }

    /**
     * function _strict_mode_end
     * @author dinhtv
     * @return bool
     * createdDate: 02/02/2023
     * updatedDate: 02/02/2023
     */
    protected function _strict_mode_end($optional = [])
    {
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            return !empty($optional['insertedId']) ? $optional['insertedId'] : TRUE;
        } else {
            $this->db->trans_rollback();
            return FALSE;
        }
    }

    /**
     * function _like
     * @author dinhtv
     * @return void
     * createdDate: 08/02/2023
     * updatedDate: 08/02/2023
     */
    protected function _like($arrLike = [], $table = NULL)
    {
        if (empty($table))
            $table = $this->_table;
        $like = $this->check_if_column_exists($arrLike, $table);
        if (!empty($like)) {
            foreach ($like as $field => $value) {
                $this->db->like($field, trim($value));
            }
        }
    }

    /**
     * function _like
     * @author dinhtv
     * @return void
     * createdDate: 08/02/2023
     * updatedDate: 08/02/2023
     */
    protected function _not_like($arrNotLike = [], $table = NULL)
    {
        if (empty($table))
            $table = $this->_table;
        $notLike = $this->check_if_column_exists($arrNotLike, $table);
        if (!empty($notLike)) {
            foreach ($notLike as $field => $value) {
                $this->db->not_like($field, trim($value));
            }
        }
    }
}
