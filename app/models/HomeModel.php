<?php

require_once './database/connection.php';

class HomeModel
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getCats($endpoint)
    {

        // echo ('URL gerada: ' . $endpoint);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);


        if (curl_errno($ch) || $httpCode !== 200) {
            echo ('Erro cURL: ' . curl_error($ch));
            echo ('Código HTTP: ' . $httpCode);
            curl_close($ch);
            return ['error' => 'Failed to fetch data from API'];
        }

        curl_close($ch);
        return json_decode($response, true);
    }
    public function getLikes($userId)
    {
        try {
            $query = "SELECT cat_id FROM wishlist WHERE user_id = :user_id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();

            $likes = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $likes[] = $row['cat_id'];
            }

            return $likes;
        } catch (Exception $e) {
            error_log('Erro ao buscar likes: ' . $e->getMessage());
            return [];
        }
    }
    public function setLikes($userId, $catId, $isLiked)
    {
        try {

            if (!$isLiked) {
                $query = "INSERT INTO wishlist (user_id, cat_id) VALUES (:user_id, :cat_id)";
            } else {
                $query = "DELETE FROM wishlist WHERE user_id = :user_id AND cat_id = :cat_id";
            }
            $query = "INSERT INTO wishlist (user_id, cat_id) VALUES (:user_id, :cat_id)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':cat_id', $catId, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            // error_log("Erro ao adicionar like: " . $e->getMessage());
            throw new Exception("Erro ao adicionar à lista de desejos.");
        }
    }
}
