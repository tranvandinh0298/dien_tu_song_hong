<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('setRules')) {
    /**
     * function setRules
     * dev: dinhtv
     * created date: 24/2/2022
     * updated date: 24/2/2022
     */
    function setRules($field, $label, $rules)
    {
        return [
            'field' => $field,
            'label' => $label,
            'rules' => $rules
        ];
    }
}

if (!function_exists('isRequestPost')) {
    /**
     * function isRequestPost
     * dev: dinhtv
     * creatd date: 23/2/2022
     * updated date: 23/2/2022
     */
    function isRequestPost()
    {
        $_this = &get_instance();
        return $_this->input->server('REQUEST_METHOD') === 'POST';
    }
}

if (!function_exists('isRequestGet')) {
    /**
     * function isRequestPost
     * dev: dinhtv
     * creatd date: 23/2/2022
     * updated date: 23/2/2022
     */
    function isRequestGet()
    {
        $_this = &get_instance();
        return $_this->input->server('REQUEST_METHOD') === 'GET';
    }
}

if (!function_exists('displayEditButton')) {
    /**
     * function hiển thị nút chỉnh sửa bản ghi
     * @author dinhtv
     * @param string $url
     * @param string $text
     * @since 10/03/2023
     */
    function displayEditButton($url, $text = null)
    {
        $txt = !empty($text) ? $text : '';
        return '<a href="' . base_url($url) . '" class="btn btn-info" alt="' . $txt . '"><i class="fas fa-pencil-alt"></i> ' . $txt . '</a>';
    }
}
if (!function_exists('displayActiveButton')) {
    /**
     * function hiển thị nút bật/tắt bản ghi
     * @author dinhtv
     * @param string $url
     * @param bool $status
     * @since 10/03/2023
     */
    function displayActiveButton($url, $status)
    {
        $txt = $status ? 'Vô hiệu hóa' : 'Kích hoạt';
        if ($status) {
            return '<a href="' . base_url($url) . '" class="btn btn-outline-danger" alt="' . $txt . '"><i class="fas fa-times"></i></a>';
        } else {
            return '<a href="' . base_url($url) . '" class="btn btn-outline-success" alt="' . $txt . '"><i class="fas fa-check"></i></a>';
        }
    }
}

if (!function_exists('displayResetButton')) {
    /**
     * function hiển thị nút bật/tắt bản ghi
     * @author dinhtv
     * @param string $url
     * @param bool $status
     * @since 10/03/2023
     */
    function displayResetButton()
    {
        return
            '
        <button type="reset" class="btn btn-default">
            <i class="fas fa-redo-alt"></i>
            Cài lại
        </button>
        ';
    }
}

if (!function_exists('displaySubmitButton')) {
    /**
     * function hiển thị nút bật/tắt bản ghi
     * @author dinhtv
     * @param string $url
     * @param bool $status
     * @since 10/03/2023
     */
    function displaySubmitButton()
    {
        return
            '
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i>
            Lưu
        </button>
        ';
    }
}

if (!function_exists('displayGalleryButton')) {
    /**
     * function hiển thị nút chỉnh sửa bản ghi
     * @author dinhtv
     * @param string $url
     * @param string $text
     * @since 10/03/2023
     */
    function displayGalleryButton($url, $text = null)
    {
        $txt = !empty($text) ? $text : '';
        return '<a href="' . base_url($url) . '" class="btn btn-info" alt="' . $txt . '"><i class="fas fa-images"></i> ' . $txt . '</a>';
    }
}

if (!function_exists('formInput')) {
    /**
     * function hiển thị nút bật/tắt bản ghi
     * @author dinhtv
     * @param string $url
     * @param bool $status
     * @since 10/03/2023
     */
    function formInput($name, $type = 'text')
    {
        echo '<input type="' . $type . '" name="' . $name . '" />';
    }
}

if (!function_exists('formInputName')) {
    /**
     * function hiển thị input name
     * @author dinhtv
     * @param string $initValue
     * @since 10/03/2023
     */
    function formInputName($initValue = '')
    {
        return '
        <div class="form-group">
            <label for="">' . lang('name') . '</label>
            <div class="input-group">
                <input type="text" class="form-control" name="name" value="' . $initValue . '" placeholder="Tên"  />
            </div>
        </div>
        ';
    }
}

if (!function_exists('formInputImage')) {
    /**
     * function hiển thị input name
     * @author dinhtv
     * @param string $initValue
     * @since 10/03/2023
     */
    function formInputImage($initValue = '', $name = '', $label = '')
    {
        if (empty($label)) {
            $label = lang('image');
        }
        if (empty($name)) {
            $name = 'image';
        }
        $id = $name . rand(0, 1000);
        $html = '
        <div class="form-group">
            <label for="">' . $label . '</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" data-role="image-input" name="' . $name . '" class="custom-file-input" id="' . $id . '">
                    <label class="custom-file-label" for="' . $id . '">Chọn file</label>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text">Tải lên</span>
                </div>
            </div>
        </div>
        ';
        if (empty($initValue)) {
            $html .= '
            <div class="row">
                <div class="col-6">
                    <img src="" data-role="image-placeholder" height="auto" alt="">
                </div>
            </div>';
        } else {
            $html .= '
            <div class="row">
                <div class="col-6">
                    <p>Hình ảnh hiện tại</p>
                    <img src="' . base_url($initValue) . '" id="logo-current" height="auto" alt="">
                </div>
                <div class="col-6">
                    <img src="" data-role="image-placeholder" height="auto" alt="">
                </div>
            </div>';
        }
        return $html;
    }
}

if (!function_exists('formInputStatus')) {
    /**
     * function hiển thị input name
     * @author dinhtv
     * @param string $initValue
     * @since 10/03/2023
     */
    function formInputStatus($initValue = null)
    {
        $active = isset($initValue) && (int) $initValue === RECORD_ACTIVE ? 'selected' : '';
        $inActive = isset($initValue) && (int) $initValue === RECORD_INACTIVE ? 'selected' : '';
        return
            '
        <div class="form-group">
            <label for="">' . lang('status') . '</label>
            <div class="input-group">
                <select data-role="select" class="form-control select2" name="status" style="width: 100%;">
                    <option value="' . RECORD_ACTIVE . '" ' . $active . '>Hoạt động</option>
                    <option value="' . RECORD_INACTIVE . '" ' . $inActive . '>Ngừng hoạt động</option>
                </select>
            </div>
        </div>
        ';
    }
}

if (!function_exists('formInputFeature')) {
    /**
     * function hiển thị input name
     * @author dinhtv
     * @param string $initValue
     * @since 10/03/2023
     */
    function formInputFeature($initValue = null)
    {
        $active = isset($initValue) && (int) $initValue === RECORD_ACTIVE ? 'selected' : '';
        $inActive = isset($initValue) && (int) $initValue === RECORD_INACTIVE ? 'selected' : '';
        return
            '
        <div class="form-group">
            <label for="">' . lang('feature') . '</label>
            <div class="input-group">
                <select data-role="select" class="form-control select2" name="feature" style="width: 100%;">
                    <option value="' . RECORD_ACTIVE . '" ' . $active . '>' . lang('feature_up') . '</option>
                    <option value="' . RECORD_INACTIVE . '" ' . $inActive . '>' . lang('feature_down') . '</option>
                </select>
            </div>
        </div>
        ';
    }
}

if (!function_exists('formInputEditor')) {
    /**
     * function hiển thị input name
     * @author dinhtv
     * @param string $initValue
     * @since 10/03/2023
     */
    function formInputEditor($name = 'description', $initValue = null, $label = null)
    {
        if (empty($label)) {
            $label = lang('description');
        }
        return
            '
            <div class="form-group">
            <label for="">' . $label . '</label>
            <textarea data-role="editor" name="' . $name . '" id="summernote">
            ' . $initValue . '
            </textarea>
        </div>
        ';
    }
}

if (!function_exists('formInputNote')) {
    /**
     * function hiển thị input name
     * @author dinhtv
     * @param string $initValue
     * @since 10/03/2023
     */
    function formInputNote($initValue = '')
    {
        return '
        <div class="form-group">
            <label for="">' . lang('note') . '</label>
            <div class="input-group">
                <input type="text" class="form-control" name="note" value="' . $initValue . '" placeholder="Chú thích"  />
            </div>
        </div>
        ';
    }
}
