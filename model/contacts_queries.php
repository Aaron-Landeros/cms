<?php

//! Fetch all contacts
function fetch_all_contacts(){
    include '../utilities/db_conn.php';
    $db = new PDO($dsn, $username, $password);

    $query = 'SELECT * FROM user_contacts ORDER BY contact_fullname ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    $query_results = $statement->fetchAll();
    $statement->closeCursor();
    return $query_results;
}

//! Editar contact
function edit_contact($contact_id, $contact_fullname, $contact_mobile, $contact_email, $contact_company){
    include "../utilities/db_conn.php";
    $db = new PDO($dsn, $username, $password);
	$query = 'UPDATE user_contacts
                SET contact_fullname = :contact_fullname,
                    contact_mobile = :contact_mobile,
                    contact_email = :contact_email,
                    contact_company = :contact_company
                WHERE contact_id = :contact_id';

			$statement = $db->prepare($query);
            $statement->bindValue(':contact_id', $contact_id);
            $statement->bindValue(':contact_fullname', $contact_fullname);
            $statement->bindValue(':contact_mobile', $contact_mobile);
            $statement->bindValue(':contact_email', $contact_email);
            $statement->bindValue(':contact_company', $contact_company);
			$statement->execute();
            $statement->closeCursor();
}

function delete_contact($contact_id){
    include "../utilities/db_conn.php";
    $db = new PDO($dsn, $username, $password);
	$query = 'DELETE FROM user_contacts
                WHERE contact_id = :contact_id';

			$statement = $db->prepare($query);
            $statement->bindValue(':contact_id', $contact_id);
			$statement->execute();
            $statement->closeCursor();
}
function search_contact_by_number($search_value) {
    include '../utilities/db_conn.php';
    $db = new PDO($dsn, $username, $password);
    $query = 'SELECT * FROM user_contacts WHERE contact_mobile LIKE :search_value ORDER BY contact_fullname ASC';
    $statement = $db->prepare($query);
    $statement->bindValue(':search_value', "%$search_value%");
    $statement->execute();
    $query_results = $statement->fetchAll();
    $statement->closeCursor();
    return $query_results;
}

?>