<?php
include 'facedetect.php';
echo json_encode(facedetect('/home/satori/Desktop/f4d9ebe740fd4bc89e9fec6901bc143c.jpg'));
//output face location

echo json_encode(facedetect('/home/satori/Desktop/f4d9ebe740fd4bc89e9fec6901bc143c.jpg',
	'/home/satori/Desktop/result.jpg', 1));
//output face location and result image