<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller {
  /**
   * Function to send response success
   * 
   * @param result
   * @param message
   * @param code
   * @return \Illuminate\Http\Response
   */
  public function sendResponse($result, $message, $code = 200) {
    $response = [
      'success' => true,
      'message' => $message,
      'data' => $result
    ];

    return response()->json($response, $code);
  }

  /**
   * Function to send response error
   * 
   * @param error
   * @param errorMessage
   * @param code
   * @return \Illuminate\Http\Response
   */
  public function sendError($error, $errorMessages = [], $code = 404) {
    $response = [
      'success' => false,
      'message' => $error
    ];
    
    // Chek is variable errorMessages empty
    if (!empty($errorMessages)) {
      $response['data'] = $errorMessages;
    }

    return response()->json($response, $code);
  }
}