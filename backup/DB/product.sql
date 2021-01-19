create table product(
	-- id san pham
	id int primary key auto_increment,
    -- mau san pham
    product_color int,
    foreign key(product_color) references color_product(id),
    -- hang san pham
    product_manu int,
    foreign key(product_manu) references manu_product(id),
    -- he dieu hanh cua san pham
    product_os varchar(150),
    -- mo ta san pham 
    product_des text,
    -- man hinh san pham
    product_tech_screen varchar(150),
    product_resolution_screen varchar(150), -- do phan giai
    product_width_screen varchar(150), -- man hinh rong
    product_touch_glass varchar(150), -- mat kinh cam ung
    -- camera sau
    product_resolution_camerarear varchar(150), -- do phan giai 
    product_record_camerarear varchar(150), -- quay phim
    product_flash_camerarear varchar(150), -- den flash
    product_feature_camerarear varchar(200), -- tinh nang camera sau
    -- camera truoc
    product_resolution_frontcamera varchar(150),
    product_videocall_frontcamera tinyint, -- co hay ko
    product_feature_frontcamera varchar(200), -- tinh nang camera truoc
    -- cpu
    product_cpu varchar(150),
    product_specification_cpu varchar(150), -- thong so ky thuat cpu
    -- gpu 
    product_gpu varchar(150),
    product_specification_gpu varchar(150),-- thong so ky thuat gpu
    -- bo nho va luu tru
	product_ram int, -- ram
    product_storage int, -- tong bo nho
    product_memorycard varchar(150), -- the nho ngoai
    -- ket noi
    product_mobilenetwork varchar(15), -- mang di dong
    product_sim varchar(150),
    product_wifi varchar(150),
    product_gps varchar(150),
    product_bluetooth varchar(150),
    product_chargingport varchar(150), -- cong sac, cong ket noi
    product_jack varchar(150), -- jack tai nghe
    product_otherconnect varchar(150), -- ket noi khac
    -- thiet ke va trong luong
    product_design varchar(150),
    product_material varchar(150), -- chat lieu
    product_size varchar(150), 
    product_weight int,
    -- pin va sac
    product_batterycapacity varchar(150), -- dung luong pin
    product_batterytype varchar(150), -- loai pin
    -- thoi gian
    product_timeoflaunch date, -- thoi diem ra mat
    product_timeofposting date,
    -- bao hanh
    product_guarantee int,
    -- so luong san pham
    product_quantity int,
    -- ten san pham
    product_name varchar(150),
    -- gia san pham
    product_price float,
    -- trang thai san pham( con hang hay het hang)
    product_status tinyint not null
    )
