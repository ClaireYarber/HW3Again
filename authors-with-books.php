<?php
function selectAuthors() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT author_id, author_name, publisher FROM `author`");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function selectBooksByAuthors($iid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT c.book_id, book_name, book_description, year, month, day FROM `book` c join section s on s.book_id = c.book_id where s.author_id=?");
        $stmt->bind_param("i", $iid);
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
