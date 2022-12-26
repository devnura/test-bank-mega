CREATE TABLE karyawan (
	nip varchar NOT NULL,
	nama varchar NOT NULL,
	umur int NOT NULL,
	gaji int8 NOT NULL,
	valuta varchar(20) NULL,
	CONSTRAINT karyawan_pk PRIMARY KEY (nip),
	CONSTRAINT karyawan_un UNIQUE (nip)
);

CREATE TABLE kurs (
	valuta varchar(3) NOT NULL,
	kurs int8 NOT NULL,
	CONSTRAINT kurs_pk PRIMARY KEY (valuta),
	CONSTRAINT kurs_un UNIQUE (valuta)
);

INSERT INTO karyawan (nip, nama, umur, gaji, valuta) VALUES 
    ('001', 'Anton', 25, 650, 'USD'),
    ('002', 'Budi', 35, 545, 'EUR'),
    ('003', 'Charles', 30, 7000000, 'IDR'),
    ('004', 'Dodi', 27, 900, 'USD'),
    ('005', 'Edwin', 41, 10000000, 'IDR'),
    ('006', 'Fajar', 20, 750, 'EUR');

INSERT INTO kurs (valuta, kurs) VALUES
    ('IDR', 1),
    ('USD', 10000),
    ('EUR', 9000),
    ('CNY', 150),
    ('JYP', 200);

/* Report Karyawan By Range Umur */
SELECT 
    CASE 
        WHEN karyawan.umur BETWEEN 21 AND 30 THEN '21-30 tahun'
        WHEN karyawan.umur BETWEEN 31 AND 40 THEN '31-40 tahun'
        else 'Lain-lain'
    END range_umur,
    COUNT (karyawan.nip) ||' orang' AS total_karyawan,
    SUM (karyawan.gaji * kurs.kurs) AS total_gaji
FROM karyawan
LEFt JOIN kurs ON kurs.valuta = karyawan.valuta
GROUP BY 1
ORDER BY range_umur


/* Report Karyawan Per Mata Uang, tetapi yang tampil adalah yang total per valutanya di atas Rp. 15.000.000 */
SELECT * FROM (
		SELECT
		    karyawan.valuta,
		    COUNT(karyawan.nip) AS total_karyawan,
		    SUM(karyawan.gaji * kurs.kurs) AS total_gaji
		FROM karyawan
		LEFT JOIN kurs ON kurs.valuta = karyawan.valuta
		GROUP BY 1
	) tmp
WHERE tmp.total_gaji > 15000000;

