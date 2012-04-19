<?php
/**
 * Send email with attachment
 *
 * @package		Mail_attach
 * @author		Paulo Andre G Rodrigues <pauloandreget@gmail.com>
 * @link		http://www.paulorodrigues.eti.br
 * @since		February 12, 2010
 * @version 	20100212
 */

// ------------------------------------------------------------------------

class Mail_attach {
	
	// Array with allowed mime type of attachment files
	private $mime_files = array(
									  "html" => "text/html",
									  "htm" => "text/html",
									  "txt" => "text/plain",
									  "rtf" => "text/enriched",
									  "csv" => "text/tab-separated-values",
									  "css" => "text/css",
									  "gif" => "image/gif",
									  "jpg" => "image/pjpeg",
									  "png" => "image/png"
								);
	
	// Email attributes
	private $__from;
	private $__to;
	private $__subject;
	private $__message;
	
	/**
	 * Constructor
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @param	string
	 * @param	string
	 * @return	void
	 */
	public function __construct($from, $to, $subject, $message) {
		$this->__from = $from;
		$this->__to = $to;
		$this->__subject = $subject;
		
		$this->__message = "--XYZ-" . date('dmyhms') . "-ZYX\n";
		$this->__message .= "Content-Transfer-Encoding: 8bits\n";
		$this->__message .= "Content-Type: text/plain; charset=\"ISO-8859-1\"\n\n";
		$this->__message .= $message;
		$this->__message .= "\n";
	}
	
	/**
	 * Make file attachment
	 *
	 * @access	private
	 * @param	array
	 * @return	void||boolean
	 */
	private function attach($file = array()) {
		if (!in_array($file['type'], $this->mime_files)) return false;
		
		$fp = fopen($file['tmp_name'], 'rb');
		$content = fread($fp, filesize($file['tmp_name']));
		$encoded = chunk_split(base64_encode($content));
		fclose($fp);
		
		$this->__message .= "--XYZ-" . date('dmyhms') . "-ZYX\n";
		$this->__message .= "Content-Type: " . $file['type'] . "\n";
		$this->__message .= "Content-Disposition: attachment; filename=\"" . $file['name'] . "\" \n";
		$this->__message .= "Content-Transfer-Encoding: base64\n\n";
		$this->__message .= "$encoded\n";
		$this->__message .= "--XYZ-" . date('dmyhms') . "-ZYX\n";
		
		return true;
	}
	
	/**
	 * Send email
	 *
	 * @access	public
	 * @param	array||boolean
	 * @return	boolean
	 */
	public function sendMail($file = false) {
		if ($file['size'] > 0) {
			if (!$this->attach($file)) {
				return false;
			}
		}
		
		$headers = "MIME-Version: 1.0\n";
		$headers .= "From: <" . $this->__from . ">\r\n";
		$headers .= "Content-type: multipart/mixed; boundary=\"XYZ-" . date('dmyhms') . "-ZYX\"\r\n";
		
		$mail = mail($this->__to, $this->__subject, $this->__message, $headers);
		
		if ($mail) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file Mail_attach.php */
/* Location: ./mail/class/Mail_attach.php */