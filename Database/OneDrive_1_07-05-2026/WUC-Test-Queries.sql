/*

Using the function called LPAD, we can reformat the ID to have the trailing 0s for the output

Getting the first student record would be done via:


SELECT
  LPAD(student_id, 8, '0') AS student_id,
  first_name,
  middle_name,
  surname,
  year_of_study,
  current_address,
  home_address,
  phone_number,
  email,
  emergency_contact,
  record_status,
  course_id
FROM students
WHERE student_id = 00001226;


*/