<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->helper('url');
    }

    function index()
    {
        //this function will retrive all entry in the database
        $data['query'] = $this->blog_model->get_all_posts();
        $data['o'] = $this->blog_model->get_all_comments();
        $this->load->view('blog/index_1',$data);
    }

    function add_new_entry()
    {

        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));

        //set validation rules
        $this->form_validation->set_rules('entry_name', 'Title', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('entry_body', 'Body', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            //if not valid
            $this->load->view('blog/add_new_entry');
        }
        else
        {
            //if valid
            $name = $this->input->post('entry_name');
            $body = $this->input->post('entry_body');
            $this->blog_model->add_new_entry($name,$body);
            redirect('../blog');
        }
    }



    public function post($id)
    {
        $data['query'] = $this->blog_model->get_post($id);
        $data['comments'] = $this->blog_model->get_post_comment($id);
        $data['total_comments'] = $this->blog_model->total_comments($id);

        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));

        //set validation rules
        $this->form_validation->set_rules('commenter', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('comment', 'Comment', 'required');

        if($this->blog_model->get_post($id))
        {
            foreach($this->blog_model->get_post($id) as $row)
            {
                //set page title
                $data['title'] = $row->entry_name;
            }

            if ($this->form_validation->run() == FALSE)
            {
                //if not valid
                $this->load->view('blog/post',$data);
            }
            else
            {
                //if valid
                $name = $this->input->post('commenter');
                $email = strtolower($this->input->post('email'));
                $comment = $this->input->post('comment');

                $this->blog_model->add_new_comment($id,$name,$email,$comment);
                redirect('../blog');
            }
        }
        else
            show_404();
    }

}