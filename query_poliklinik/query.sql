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

SELECT * FROM tb_profile_admin
SELECT * FROM tb_profile_pasien