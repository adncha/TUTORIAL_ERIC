<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_all_posts()
    {
        $this->db->select('*')->from('entry')->order_by("entry_date","desc");
        //get all entry
        $query = $this->db
            ->get();
        return $query->result();
    }

    function add_new_entry($name,$body)
    {
        $data = array(
            'entry_name' => $name,
            'entry_body' => $body
        );
        $this->db->insert('entry',$data);
    }

    //comment related functions
    function add_new_comment($post_id,$commenter,$email,$comment)
    {
        $data = array(
            'entry_id'=>$post_id,
            'comment_name'=>"Comment: ".$commenter,
            'comment_email'=>$email,
            'comment_body'=>$comment,
        );
        $this->db->insert('comment',$data);
    }

    function get_all_comments() 
    {
        $query = $this->db->get('comment');
        return $query->result();
    }
    
    function get_post($id)
    {
        $this->db->where('entry_id',$id);
        $query = $this->db->get('entry');
        if($query->num_rows()!==0)
        {
            return $query->result();
        }
        else
            return FALSE;
    }

    function get_post_comment($post_id)
    {
        $this->db->where('entry_id',$post_id);
        $query = $this->db->get('comment');
        return $query->result();
    }

    function total_comments($id)
    {
        $this->db->like('entry_id', $id);
        $this->db->from('comment');
        return $this->db->count_all_results();
    }
}

/* End of file blog_model.php */