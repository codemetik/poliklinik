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

SELECT x.id_specialis, specialis, IFNULL(z.id_user,'kosong') AS id_user ,IFNULL(id_dokter,'kosong') AS id_dokter, CONCAT('Dr. ',IFNULL(nama_user,'kosong')) AS nama_user,
IFNULL(jenis_kelamin,'kosong') AS jenis_kelamin, IFNULL(gol_darah,'kosong') AS gol_darah, IFNULL(tempat_lahir,'kosong') AS tempat_lahir, IFNULL(tanggal_lahir,'kosong') AS tanggal_lahir, 
IFNULL(agama,'kosong') AS agama, IFNULL(tgl_masuk,'kosong') AS tgl_masuk
FROM tb_specialis X
LEFT JOIN tb_dokter Y ON y.id_specialis = x.id_specialis
LEFT JOIN tb_user z ON z.id_user = y.id_user ORDER BY id_specialis ASC

SELECT COUNT(*) FROM tb_dokter X
INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE id_specialis = 'SPC007' 

SELECT * FROM tb_dokter X
INNER JOIN tb_user Y ON y.id_user = x.id_user

SELECT * FROM tb_pasien
SELECT * FROM tb_rols_user
SELECT * FROM tb_bagian

SELECT * FROM tb_user
SELECT * FROM tb_dokter

SELECT * FROM tb_user X
LEFT JOIN tb_pasien Y ON y.id_user = x.id_user
INNER JOIN tb_rols_user z ON z.id_user = x.id_user
WHERE id_bagian = 'BG004'


SELECT x.id_specialis, specialis, IFNULL(z.id_user,'kosong') AS id_user ,IFNULL(id_dokter,'kosong') AS id_dokter, 
CONCAT('Dr. ',IFNULL(nama_user,'kosong')) AS nama_user, IFNULL(jenis_kelamin,'kosong') AS jenis_kelamin, 
IFNULL(gol_darah,'kosong') AS gol_darah, IFNULL(tempat_lahir,'kosong') AS tempat_lahir, 
IFNULL(tanggal_lahir,'kosong') AS tanggal_lahir, IFNULL(agama,'kosong') AS agama, 
IFNULL(tgl_masuk,'kosong') AS tgl_masuk FROM tb_specialis X LEFT JOIN tb_dokter Y ON y.id_specialis = x.id_specialis 
LEFT JOIN tb_user z ON z.id_user = y.id_user ORDER BY id_specialis ASC

IFNULL(TIMESTAMPDIFF(YEAR,tanggal_lahir,NOW()),'kosong') AS umur

SELECT id_user, username, tanggal_lahir, TIMESTAMPDIFF(YEAR,tanggal_lahir,NOW()) AS umur FROM tb_user
WHERE id_user = 'usr0001'
SELECT * FROM tb_bagian
SELECT * FROM tb_rols_user
SELECT NOW()
SELECT * FROM tb_pasien
SELECT * FROM tb_dokter
SELECT * FROM tb_user X
INNER JOIN tb_rols_user Y ON y.id_user = x.id_user
WHERE id_bagian = 'BG004' GROUP BY x.id_user ASC

SELECT * FROM tb_user X LEFT JOIN tb_pasien Y ON y.id_user = x.id_user INNER JOIN tb_rols_user z ON z.id_user = x.id_user WHERE id_bagian = 'BG004'

SELECT x.id_user, nama_user, jenis_kelamin, gol_darah, tempat_lahir, tanggal_lahir,  TIMESTAMPDIFF(YEAR,tanggal_lahir, NOW()) AS umur,
agama, tgl_masuk  FROM tb_user X 
LEFT JOIN tb_pasien Y ON y.id_user = x.id_user 
INNER JOIN tb_rols_user z ON z.id_user = x.id_user 
WHERE id_bagian = 'BG004'

SELECT * FROM tb_specialis X
INNER JOIN tb_dokter Y ON y.id_specialis = x.id_specialis
INNER JOIN tb_user z ON z.id_user = y.id_user

SELECT * FROM tb_jadwal_praktek X
INNER JOIN tb_dokter Y ON y.id_dokter = x.id_dokter
INNER JOIN tb_specialis z ON z.id_specialis = x.id_specialis
INNER JOIN tb_user a ON a.id_user = y.id_user

SELECT * FROM tb_dokter

SELECT WEEKDAY()
SELECT * FROM tb_pasien
SELECT * FROM tb_user
SELECT * FROM tb_rols_user

SELECT id_pasien, id_dokter, x.id_user, nama_user, jenis_kelamin, gol_darah, tempat_lahir, tanggal_lahir,  
TIMESTAMPDIFF(YEAR,tanggal_lahir, NOW()) AS umur, agama, tgl_masuk, no_antrian, no_rekam_medis  
FROM tb_user X 
LEFT JOIN tb_pasien Y ON y.id_user = x.id_user 
INNER JOIN tb_rols_user z ON z.id_user = x.id_user 
WHERE id_bagian = 'BG004' GROUP BY no_antrian ASC 

SELECT id_pasien, id_dokter, x.id_user, nama_user, jenis_kelamin, gol_darah, tempat_lahir, tanggal_lahir, 
TIMESTAMPDIFF(YEAR,tanggal_lahir, NOW()) AS umur, agama, tgl_masuk, no_antrian, no_rekam_medis, hari, waktu 
FROM tb_user X 
LEFT JOIN tb_pasien Y ON y.id_user = x.id_user 
INNER JOIN tb_rols_user z ON z.id_user = x.id_user 
WHERE id_bagian = 'BG004' GROUP BY no_antrian DESC

SELECT * FROM tb_dokter X
INNER JOIN tb_specialis Y ON y.id_specialis = x.id_specialis
INNER JOIN tb_jadwal_praktek a ON a.id_dokter = x.id_dokter
INNER JOIN tb_user z ON z.id_user = x.id_user

SELECT * FROM tb_hari
SELECT * FROM tb_jadwal_praktek
SELECT * FROM tb_jadwal_praktek

SELECT id_pasien, id_dokter, x.id_user, nama_user, jenis_kelamin, gol_darah, tempat_lahir, tanggal_lahir, 
TIMESTAMPDIFF(YEAR,tanggal_lahir, NOW()) AS umur, agama, tgl_masuk, no_antrian, no_rekam_medis,hari,waktu FROM tb_user X 
LEFT JOIN tb_pasien Y ON y.id_user = x.id_user 
INNER JOIN tb_rols_user z ON z.id_user = x.id_user 
WHERE id_bagian = 'BG004' GROUP BY no_antrian DESC

SELECT * FROM tb_user
SELECT * FROM tb_rols_user
SELECT * FROM tb_pasien

SELECT * FROM tb_user X
INNER JOIN tb_rols_user Y ON y.id_user = x.id_user
INNER JOIN tb_bagian z ON z.id_bagian = y.id_bagian

SELECT * FROM table_specialis_dokter

SELECT * FROM tb_user X
INNER JOIN tb_rols_user Y ON y.id_user = x.id_user
INNER JOIN tb_bagian z ON z.id_bagian = y.id_bagian

SELECT * FROM tb_pasien
SELECT * FROM tb_hari

SELECT id_pasien, id_dokter, x.id_user, nama_user, jenis_kelamin, gol_darah, tempat_lahir, tanggal_lahir, 
TIMESTAMPDIFF(YEAR,tanggal_lahir, NOW()) AS umur, agama, tgl_masuk, no_antrian, no_rekam_medis,hari,waktu 
FROM tb_user X 
LEFT JOIN tb_pasien Y ON y.id_user = x.id_user 
INNER JOIN tb_rols_user z ON z.id_user = x.id_user 
WHERE id_bagian = 'BG004' GROUP BY no_antrian DESC

SELECT x.id_user, username, PASSWORD, confirm_password, nama_user, jenis_kelamin, gol_darah, tempat_lahir, tanggal_lahir, 
TIMESTAMPDIFF(YEAR, tanggal_lahir, NOW()) AS usia, agama, 
tgl_masuk, id_rols_user, id_bagian, tgl_user_regis 
FROM tb_user X
INNER JOIN tb_rols_user Y ON y.id_user = x.id_user 
WHERE id_bagian = 'BG004'

SELECT * FROM tb_pasien

SELECT WEEKDAY('2020-11-30 20:09:44')
SELECT NOW() 2020-11-26 20:09:44

0=senin,1=selasa,2=rabu,3=kamis,4=jumat,5=sabtu,6=minggu,

SELECT IF(WEEKDAY(NOW())= '0','senin',
IF(WEEKDAY(NOW())='1','selasa',
IF(WEEKDAY(NOW())='2','rabu',
IF(WEEKDAY(NOW())='3','kamis',
IF(WEEKDAY(NOW())='4','jumat',
IF(WEEKDAY(NOW())='5','sabtu',
IF(WEEKDAY(NOW())='6','minggu','salah'))))))) 
AS hari

SELECT NOW()

SELECT DATE(NOW())
SELECT WEEKDAY(DATE(NOW()))

SELECT WEEKDAY('20201126')

SELECT * FROM tb_pasien_baru
SELECT * FROM tb_rols_user

SELECT * FROM tb_user

SELECT MAX(no_antrian) FROM tb_pasien_baru

SELECT * FROM posting_pendaftaran

SELECT x.id_user,no_antrian, hari AS hari_daftar,username, PASSWORD, confirm_password, nama_user, jenis_kelamin, gol_darah, 
tempat_lahir, tanggal_lahir, 
TIMESTAMPDIFF(YEAR, tanggal_lahir, NOW()) AS usia, agama, tgl_masuk, id_rols_user, id_bagian, y.tgl_user_regis 
FROM tb_user X 
INNER JOIN tb_rols_user Y ON y.id_user = x.id_user 
INNER JOIN tb_pasien_baru z ON z.id_user = x.id_user
WHERE id_bagian = 'BG004' GROUP BY no_antrian DESC

SELECT * FROM tb_pasien_baru

SELECT * FROM tb_pasien
SELECT * FROM tb_rols_user
SELECT * FROM tb_user

SELECT hari FROM tb_pasien

SELECT x.id_user,no_antrian, hari AS hari_daftar,username, PASSWORD, confirm_password, nama_user, 
jenis_kelamin, gol_darah, tempat_lahir, tanggal_lahir, TIMESTAMPDIFF(YEAR, tanggal_lahir, NOW()) AS usia, agama, tgl_masuk, 
id_rols_user, id_bagian, y.tgl_user_regis 
FROM tb_user X 
INNER JOIN tb_rols_user Y ON y.id_user = x.id_user 
INNER JOIN tb_pasien_baru z ON z.id_user = x.id_user WHERE id_bagian = 'BG004' GROUP BY no_antrian DESC