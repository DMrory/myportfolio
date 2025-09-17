<?php
// whatsapp_handler.php
class WhatsAppIntegration {
    private $phone_number;
    private $default_message;
    
    public function __construct($phone, $message = "Hello, I visited your portfolio and would like to connect.") {
        $this->phone_number = $this->sanitizePhone($phone);
        $this->default_message = urlencode($message);
    }
    
    private function sanitizePhone($phone) {
        // Remove any non-numeric characters except '+'
        return preg_replace('/[^0-9+]/', '', $phone);
    }
    
    public function generateLink($custom_message = null) {
        $message = $custom_message ? urlencode($custom_message) : $this->default_message;
        return "https://wa.me/{$this->phone_number}?text={$message}";
    }
    
    public function createClickToChatButton($button_text = "Chat via WhatsApp", $custom_classes = "") {
        $link = $this->generateLink();
        return '<a href="' . $link . '" class="whatsapp-button ' . $custom_classes . '" target="_blank">' . $button_text . '</a>';
    }
}

// Implementation example
$whatsapp = new WhatsAppIntegration("+1234567890", "Hello, I saw your portfolio and want to connect!");
echo $whatsapp->createClickToChatButton("Message Me", "btn btn-success m-2");
?>