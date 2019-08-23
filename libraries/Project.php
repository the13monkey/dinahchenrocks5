<?php

class Project
{
    private $db;

    public function __construct()
    {
      $this->db = new Database;
    }

    public function finduniquelangs()
    {
      $this->db->query('SELECT DISTINCT languages.language_name, icons.icon_location, icons.icon_color FROM languages RIGHT JOIN icons ON languages.language_name = icons.icon_name ORDER BY icons.icon_order ASC');
      $results = $this->db->resultset();
      return $results; 
    }

    public function findallprojects()
    {
      $this->db->query('SELECT * FROM projects');
      $results = $this->db->resultset();
      return $results; 
    }

    public function countSingleLanguage($name)
    {
      $this->db->query('SELECT * FROM languages WHERE (language_name = :name)');
      $this->db->bind(':name', $name);
      $result = $this->db->rowCount();
      return $result; 
    }

    /*
    public function getAllProjects()
    {
      $this->db->query('SELECT * FROM projects ORDER BY create_date DESC');
      $results = $this->db->resultset();
      return $results;
    }

    public function getProjectLanguages($project_id)
    {
      $this->db->query('SELECT language_name, icon FROM languages WHERE (project_id = :project_id AND imp = 1)' );
      $this->db->bind(':project_id', $project_id);
      $results = $this->db->resultset();
      return $results;
    }

    public function getSpecificProjects($lang_name)
    {
      $this->db->query('SELECT * FROM projects LEFT JOIN languages ON (projects.id = languages.project_id) WHERE (languages.language_name = :language_name) ORDER BY projects.create_date DESC');
      $this->db->bind(':language_name', $lang_name);
      $results = $this->db->resultset();
      return $results;
    }

    public function findalluniquelanguages()
    {
      $this->db->query('SELECT language_name, color FROM languages GROUP BY language_name ORDER BY sort_order ASC');
      $results = $this->db->resultset();
      return $results; 
    }

    public function countSingleLanguage($language_name) 
    {
      $this->db->query('SELECT * FROM languages WHERE (language_name = :language_name)');
      $this->db->bind(':language_name', $language_name);
      $result = $this->db->rowCount();
      return $result; 
    }
    */
}
