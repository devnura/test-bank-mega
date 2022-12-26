-- public.karyawan definition

-- Drop table

-- DROP TABLE public.karyawan;

CREATE TABLE public.karyawan (
	id serial4 NOT NULL,
	nip varchar NOT NULL,
	nama varchar NOT NULL,
	division varchar NULL,
	CONSTRAINT karyawan_pk PRIMARY KEY (id)
);