<?php



class HomeModel
{
    public function getCats($endpoint, $params = [])
    {
        $url = $endpoint . '?' . http_build_query($params);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch) || $httpCode !== 200) {
            curl_close($ch);
            return ['error' => 'Failed to fetch data from API'];
        }

        curl_close($ch);
        return json_decode($response, true);
    }
}
