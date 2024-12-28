<?php



class HomeModel
{
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
}
