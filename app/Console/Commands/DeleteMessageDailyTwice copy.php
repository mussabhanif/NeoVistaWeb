<?php

// namespace App\Console\Commands;

// use Illuminate\Console\Command;
// use Firebase\JWT\JWT;
// use Firebase\JWT\Key;
// use GuzzleHttp\Client;

// class DeleteMessageDailyTwice extends Command
// {
//     /**
//      * The name and signature of the console command.
//      *
//      * @var string
//      */
//     protected $signature = 'app:delete-message-daily-twice';

//     /**
//      * The console command description.
//      *
//      * @var string
//      */
//     protected $description = 'Delete Firestore documents daily twice';

//     /**
//      * Execute the console command.
//      */
//     public function handle()
//     {
//         $serviceAccountPath = config('firebase.credentials.path'); // Path to your service account JSON file
//         $collection = 'messages'; // Replace with your Firestore collection name

//         // Step 1: Generate an OAuth2 Token
//         $accessToken = $this->getAccessToken($serviceAccountPath);

//         if (!$accessToken) {
//             $this->error('Failed to generate access token.');
//             return;
//         }

//         // Step 2: Fetch documents from the Firestore collection
//         $documents = $this->getFirestoreDocuments($accessToken, $collection);

//         if (!$documents) {
//             $this->info('No documents found or failed to fetch documents.');
//             return;
//         }

//         // Step 3: Delete each document
//         foreach ($documents as $document) {
//             $this->deleteFirestoreDocument($accessToken, $document['name']);
//             $this->info("Deleted document: {$document['name']}");
//         }

//         $this->info('Firestore cleanup completed successfully.');
//     }

//     private function getAccessToken($serviceAccountPath)
//     {
//         $serviceAccount = json_decode(file_get_contents($serviceAccountPath), true);

//         $now = time();
//         $payload = [
//             'iss' => $serviceAccount['client_email'],
//             'sub' => $serviceAccount['client_email'],
//             'aud' => 'https://oauth2.googleapis.com/token',
//             'iat' => $now,
//             'exp' => $now + 3600,
//             'scope' => 'https://www.googleapis.com/auth/datastore',
//         ];

//         $jwt = JWT::encode($payload, $serviceAccount['private_key'], 'RS256');

//         $client = new Client();
//         $response = $client->post('https://oauth2.googleapis.com/token', [
//             'form_params' => [
//                 'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
//                 'assertion' => $jwt,
//             ],
//         ]);

//         $responseBody = json_decode($response->getBody(), true);
//         return $responseBody['access_token'] ?? null;
//     }

//     private function getFirestoreDocuments($accessToken, $collection)
//     {
//         $projectID = 'neovista-messanger';
//         $url = "https://firestore.googleapis.com/v1/projects/$projectID/databases/(default)/documents/$collection";

//         $client = new Client();
//         $response = $client->get($url, [
//             'headers' => [
//                 'Authorization' => "Bearer $accessToken",
//             ],
//         ]);

//         $responseBody = json_decode($response->getBody(), true);
//         return $responseBody['documents'] ?? [];
//     }

//     private function deleteFirestoreDocument($accessToken, $documentName)
//     {
//         $client = new Client();
//         $response = $client->delete("https://firestore.googleapis.com/v1/$documentName", [
//             'headers' => [
//                 'Authorization' => "Bearer $accessToken",
//             ],
//         ]);

//         return $response->getStatusCode() === 200;
//     }
// }
