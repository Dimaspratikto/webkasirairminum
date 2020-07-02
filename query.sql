SQL> CREATE TABLESPACE dimasp_06958
  2  datafile 'D:\Teknik Informatika\SEMESTER 4\01. PRAKTIKUM BASDAT\DATAFILE\dimasp_06958.dbf'
  3  size 30M;



SQL> CREATE USER dimasp_06958
  2  IDENTIFIED BY dimas
  3  DEFAULT TABLESPACE dimasp_06958
  4  QUOTA 30M ON dimasp_06958;

User created.

SQL> GRANT ALL PRIVILEGES TO dimasp_06958;



SQL> conn dimasp_06958/dimas
Connected.
SQL> create table barang_06958
  2  (
  3  kd_barang          INTEGER         not null,
  4  nama_barang        VARCHAR2(15),
  5  stok               NUMBER(3),
  6  harga              NUMBER(12),
  7  constraint PK_barang primary key (kd_barang)
  8  );



SQL> create table kasir_06958
  2  (
  3  id_kasir           INTEGER         not null,
  4  username           VARCHAR2(15),
  5  password           VARCHAR2(15),
  6  nama_kasir         VARCHAR2(15),
  7  alamat             VARCHAR2(100),
  8  telp               NUMBER(13),
  9  constraint PK_kasir primary key (id_kasir)
 10  );



SQL> create table kurir_06958
  2  (
  3  id_kurir           INTEGER         not null,
  4  nama_kurir         VARCHAR2(20),
  5  alamat             VARCHAR2(100),
  6  telp               NUMBER(13),
  7  constraint PK_kurir primary key (id_kurir)
  8  );



SQL> create table transaksi_06958
  2  (
  3  id_transaksi       INTEGER         not null,
  4  id_kasir           INTEGER,
  5  id_kurir           INTEGER,
  6  id_pelanggan       INTEGER,
  7  total              NUMBER(12),
  8  bayar              NUMBER(12),
  9  kembali            NUMBER(12),
 10  constraint PK_transaksi primary key (id_transaksi)
 11  );



SQL> create table pelanggan_06958
  2  (
  3  id_pelanggan       INTEGER         not null,
  4  nama_pelanggan     VARCHAR2(20),
  5  alamat             VARCHAR2(100),
  6  telp               NUMBER(13),
  7  constraint PK_pelanggan primary key (id_pelanggan)
  8  );



SQL> create table detail_transaksi_06958
  2  (
  3  kd_barang          INTEGER         not null,
  4  id_transaksi       INTEGER,
  5  tanggal            DATE,
  6  qty                NUMBER(3),
  7  subtotal           NUMBER(12),
  8  constraint FK_barang FOREIGN KEY (kd_barang)
  9  REFERENCES barang_06958(kd_barang),
 10  constraint FK_transaksi FOREIGN KEY (id_transaksi)
 11  REFERENCES transaksi_06958(id_transaksi)
 12  );



SQL> alter table transaksi_06958
  2  add constraint FK_id_kasir FOREIGN KEY (id_kasir)
  3  references kasir_06958(id_kasir)
  4  add constraint FK_id_kurir FOREIGN KEY (id_kurir)
  5  references kurir_06958(id_kurir)
  6  add constraint FK_id_pelanggan FOREIGN KEY (id_pelanggan)
  7  references pelanggan_06958(id_pelanggan);



SQL> create sequence id_pelanggan
  2  minvalue 1
  3  maxvalue 9999
  4  start with 1
  5  increment by 1
  6  cache 20;


SQL> alter table pelanggan_06958
  2  rename column nama_pelanggan to nama_pelanggan_06958;



SQL> alter table kasir_06958
  2  add constraint uq_username UNIQUE(username);



SQL> alter table kasir_06958
  2  modify(password NUMBER(6));
  
insert into kurir_06958(id_kurir,nama_kurir,alamat,telp)values('1','joni','bulak1','087089087890');
insert into kurir_06958(id_kurir,nama_kurir,alamat,telp)values('2','jhon','bulak2','082089087890');
insert into kurir_06958(id_kurir,nama_kurir,alamat,telp)values('3','jena','bulak3','081089087890');
insert into kurir_06958(id_kurir,nama_kurir,alamat,telp)values('4','jeny','bulak4','083089087890');
insert into kurir_06958(id_kurir,nama_kurir,alamat,telp)values('5','jono','bulak5','088089087890');

insert all
 into kasir_06958(id_kasir,username,password,nama_kasir,alamat,telp)values('1','kasir1','12345','yanu','setro1','089567345123')
 into kasir_06958(id_kasir,username,password,nama_kasir,alamat,telp)values('2','kasir2','12345','yanna','setro2','081567345123')
 into kasir_06958(id_kasir,username,password,nama_kasir,alamat,telp)values('3','kasir3','12345','yanuar','setro3','082567345123')
 into kasir_06958(id_kasir,username,password,nama_kasir,alamat,telp)values('4','kasir4','12345','yuyun','setro4','085567345123')
 into kasir_06958(id_kasir,username,password,nama_kasir,alamat,telp)values('5','kasir5','12345','yeye','setro5','087567345123')
select 1 from dual;

insert all
into barang_06958(kd_barang,nama_barang,stok,harga)values('1','AQUA240ML','25','28000')
into barang_06958(kd_barang,nama_barang,stok,harga)values('2','AQUA600ML','30','37000')
into barang_06958(kd_barang,nama_barang,stok,harga)values('3','AQUA1500ML','70','45000')
into barang_06958(kd_barang,nama_barang,stok,harga)values('4','CLUB240ML','70','20000')
into barang_06958(kd_barang,nama_barang,stok,harga)values('5','CLUB600ML','70','34000')
select 1 from dual;

insert into pelanggan_06958 values(id_pelanggan.nextval,'Dwi','Bulak1',089123111222);
insert into pelanggan_06958 values(id_pelanggan.nextval,'Eko','Bulak2',089123222333);
insert into pelanggan_06958 values(id_pelanggan.nextval,'Eka','Bulak3',082134890678);
insert into pelanggan_06958 values(id_pelanggan.nextval,'Ekky','Bulak4',081678987001);
insert into pelanggan_06958 values(id_pelanggan.nextval,'Eno','Bulak5',089765990768);

insert all
into transaksi_06958(id_transaksi,id_kasir,id_kurir,id_pelanggan,total,bayar,kembali)values('1','1','1','106','40000','50000','10000')
into transaksi_06958(id_transaksi,id_kasir,id_kurir,id_pelanggan,total,bayar,kembali)values('2','2','2','107','37000','40000','3000')
into transaksi_06958(id_transaksi,id_kasir,id_kurir,id_pelanggan,total,bayar,kembali)values('3','3','3','108','65000','65000','0')
into transaksi_06958(id_transaksi,id_kasir,id_kurir,id_pelanggan,total,bayar,kembali)values('4','4','4','109','56000','100000','44000')
into transaksi_06958(id_transaksi,id_kasir,id_kurir,id_pelanggan,total,bayar,kembali)values('5','5','5','110','20000','50000','30000')
into transaksi_06958(id_transaksi,id_kasir,id_kurir,id_pelanggan,total,bayar,kembali)values('6','4','4','110','40000','100000','60000')
into transaksi_06958(id_transaksi,id_kasir,id_kurir,id_pelanggan,total,bayar,kembali)values('7','3','3','106','37000','100000','63000')
into transaksi_06958(id_transaksi,id_kasir,id_kurir,id_pelanggan,total,bayar,kembali)values('8','2','2','107','135000','200000','65000')
into transaksi_06958(id_transaksi,id_kasir,id_kurir,id_pelanggan,total,bayar,kembali)values('9','1','1','108','90000','100000','10000')
into transaksi_06958(id_transaksi,id_kasir,id_kurir,id_pelanggan,total,bayar,kembali)values('10','5','5','109','102000','105000','3000')
select 1 from dual;

insert all
into detail_transaksi_06958(kd_barang,id_transaksi,tanggal,qty,subtotal)values('4','1', to_date('23/10/2019','dd/mm/yyyy'),'2','40000')
into detail_transaksi_06958(kd_barang,id_transaksi,tanggal,qty,subtotal)values('2','2', to_date('24/10/2019','dd/mm/yyyy'),'1','37000')
into detail_transaksi_06958(kd_barang,id_transaksi,tanggal,qty,subtotal)values('1','3', to_date('24/10/2019','dd/mm/yyyy'),'1','28000')
into detail_transaksi_06958(kd_barang,id_transaksi,tanggal,qty,subtotal)values('2','3', to_date('24/10/2019','dd/mm/yyyy'),'1','37000')
into detail_transaksi_06958(kd_barang,id_transaksi,tanggal,qty,subtotal)values('1','4', to_date('25/10/2019','dd/mm/yyyy'),'2','56000')
into detail_transaksi_06958(kd_barang,id_transaksi,tanggal,qty,subtotal)values('4','5', to_date('26/10/2019','dd/mm/yyyy'),'1','20000')
into detail_transaksi_06958(kd_barang,id_transaksi,tanggal,qty,subtotal)values('4','6', to_date('27/10/2019','dd/mm/yyyy'),'2','40000')
into detail_transaksi_06958(kd_barang,id_transaksi,tanggal,qty,subtotal)values('2','7', to_date('02/11/2019','dd/mm/yyyy'),'1','37000')
into detail_transaksi_06958(kd_barang,id_transaksi,tanggal,qty,subtotal)values('3','8', to_date('02/11/2019','dd/mm/yyyy'),'3','135000')
into detail_transaksi_06958(kd_barang,id_transaksi,tanggal,qty,subtotal)values('3','9', to_date('03/11/2019','dd/mm/yyyy'),'2','90000')
into detail_transaksi_06958(kd_barang,id_transaksi,tanggal,qty,subtotal)values('4','10', to_date('02/11/2019','dd/mm/yyyy'),'3','102000')
select 1 from dual;