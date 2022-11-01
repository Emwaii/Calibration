<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Kalibrasi extends CI_Model
{
    private $_table = "alat_kalibrasi";

    public function getAllKalbirasi()
    {
        $this->db->select('*');
        $this->db->from('alat_kalibrasi');
        $this->db->join('t_kalibrasi', 't_kalibrasi.id_alat = alat_kalibrasi.id_alat');
        $query = $this->db->get();
        return  $query->result();
    }

    public function simpandatakalbirasi($data)
    {
        $this->db->insert('t_kalibrasi', $data);
        return TRUE;
    }

    public function _uploadFileKalibrasi()
    {
        $config['upload_path']          = './upload/kalibrasi/file_lampiran/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
        //$config['file_name']            = $this->input->post('nama_alat');
        $config['encrypt_name']         = true;
        $config['overwrite']            = true;
        $config['max_size']             = 5094; // 1MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('lampiran')) {
            return $this->upload->data("file_name");
        }
        // print_r($this->upload->display_errors());
        return "default.pdf";
    }


    public function getID($id)
    {
        return $this->db->get_where('t_kalibrasi', ['id_kalibrasi' => $id])->row();
    }

    public function _deleteFile($id)
    {
        $brosur = $this->getID($id);

        if ($brosur->file_brosur != "default.pdf") {
            $filename = explode(".", $brosur->file_brosur)[0];
            return array_map('unlink', glob(FCPATH . "upload/kalbirasi/file/$filename.*"));
        }
    }
    public function del_alatkalibrasi($id)
    {

        $this->_deleteFile($id);
        return $this->db->delete('t_kalibrasi', array("id_kalibrasi" => $id));
    }

    public function updatedataalatkalibrasi($data, $id)
    {
        $this->db->update('t_kalibrasi', $data, $id);
        return TRUE;
    }

    public function get_alat()
    {
        $query = $this->db->get('alat_kalibrasi');
        return $query->result_array();
    }
}
