SELECT * FROM tb_user

SELECT * FROM tb_bagian
SELECT * FROM tb_rols_user

SELECT * FROM tb_user X
INNER JOIN tb_rols_user Y ON y.id_user = x.id_user
INNER JOIN tb_bagian z ON z.id_bagian = y.id_bagian

//SELECT USER dokter
SELECT * FROM tb_profile_dokter X
INNER JOIN tb_user Y ON y.id_user = x.id_user
INNER JOIN tb_rols_user z ON z.id_user = x.id_user
INNER JOIN tb_bagian a ON a.id_bagian = z.id_bagian

SELECT * FROM tb_user
SELECT * FROM tb_rols_user
SELECT * FROM tb_bagian
SELECT * FROM tb_profile_dokter
SELECT * FROM tb_profile_admin
SELECT * FROM tb_jenis_kelamin

/*tb_user*/
id_user, username, PASSWORD, cofirm_password
/*tb_rols_user*/
id_rols_user, id_user, id_bagian, tgl_user_regis
/*tb_bagian*/
id_bagiaj, nama_bagian
/*tb_profile_dokter*/
id_dokter, id_user, nama_dokter, jenis_kalamin, specialis, tempat_lahir, tanggal_lahir, tgl_masuk

SELECT * FROM tb_profile_admin X
INNER JOIN tb_user Y ON y.id_user = x.id_user
INNER JOIN tb_rols_user z ON z.id_user = x.id_user
INNER JOIN tb_bagian a ON a.id_bagian = z.id_bagian

SELECT * FROM tb_profile_pasien X
INNER JOIN tb_user Y ON y.id_user = x.id_user
INNER JOIN tb_rols_user z ON z.id_user = x.id_user
INNER JOIN tb_bagian a ON a.id_bagian = z.id_bagian

SELECT * FROM tb_dokter
SELECT * FROM tb_bagian

SELECT * FROM tb_user
SELECT * FROM tb_rols_user

SELECT * FROM tb_specialis
SELECT * FROM tb_dokter
SELECT * FROM tb_jenis_kelamin

SELECT * FROM tb_user X
INNER JOIN tb_rols_user a ON a.id_user = x.id_user
INNER JOIN tb_dokter Y ON y.id_user = x.id_user
INNER JOIN tb_specialis z ON z.id_specialis = y.id_specialis WHERE x.id_user = 'USR0005'

SELECT * FROM tb_user X
INNER JOIN tb_rols_user Y ON y.id_user = x.id_user
INNER JOIN tb_bagian z ON z.id_bagian = y.id_bagian
WHERE y.id_bagian != 'BG003' AND y.id_bagian != 'BG004'

SELECT * FROM tb_user X
INNER JOIN tb_rols_user Y ON y.id_user = x.id_user
INNER JOIN tb_bagian z ON z.id_bagian = y.id_bagian
WHERE y.id_bagian = 'BG004'

SELECT * FROM tb_user X
RIGHT JOIN tb_dokter Y ON y.id_user = x.id_user
INNER JOIN tb_specialis z ON z.id_specialis = y.id_specialis

SELECT x.id_specialis, specialis, IFNULL(z.id_user,'Kosong') AS id_user , CONCAT('Dr. ',IFNULL(nama_user,'Kosong')) AS nama_user,
IFNULL(id_dokter,'Kosong') AS id_dokter FROM tb_specialis X
LEFT JOIN tb_dokter Y ON y.id_specialis = x.id_specialis
LEFT JOIN tb_user z ON z.id_user = y.id_user GROUP BY id_specialis ASC


SELECT * FROM tb_pasien
SELECT * FROM tb_rols_user
SELECT * FROM tb_bagian