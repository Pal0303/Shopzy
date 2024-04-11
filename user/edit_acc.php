
<div class="container">
    <div class="text">
        Edit Profile
    </div>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="input-data">
                <input type="text" name="prod_title" placeholder="Enter Product title here.." required>
                <div class="underline"></div>
            </div>

            <div class="input-data">
                <input type="text" name="prod_desc" placeholder="Enter Product description here.." required>
                <div class="underline"></div>

            </div>
        </div>

        <div class="form-row">
            <div class="input-data">
                <input type="text" name="prod_feat1" placeholder="Enter Product Feature-1 here.." required>
                <div class="underline"></div>
            </div>

            <div class="input-data">
                <input type="text" name="prod_feat2" placeholder="Enter Product Feature-2 here.." required>
                <div class="underline"></div>
            </div>
        </div>

        <div class="form-row">
            <div class="input-data">
                <input type="text" name="prod_feat3" placeholder="Enter Product Feature-3 here.." required>
                <div class="underline"></div>
            </div>

            <div class="input-data">
                <input type="text" name="prod_key" placeholder="Enter Product Keywords here.." required>
                <div class="underline"></div>
            </div>
        </div>

       

        <div class="form-row">
            <div class="input-data">
                <span for="prod_img1">Product image-1</span><br><br>
                <input type="file" name="prod_img1" required></input>

                <!-- <label for="prod_img1">Product image-1</label> -->
            </div>

            <div class="input-data">
                <span for="prod_img2">Product image-2</span><br><br>
                <input type="file" name="prod_img2" required></input>

                <!-- <label for="prod_img2">Product image-2</label> -->
            </div>
        </div>

        <div class="form-row">
            <div class="input-data">
                <input type="text" name="prod_price" placeholder="Enter Product Price here.." required>
                <div class="underline"></div>
            </div>

            <div class="input-data">
                <input type="text" name="prod_dis" placeholder="Enter Product Discount here.." required>
                <div class="underline"></div>
            </div>
        </div>



        <div class="form-row submit-btn">
            <div class="input-data">
                <div class="inner"></div>
                <input type="submit" name="submit_prod" value="submit">
            </div>
        </div>
    </form>
</div>

</section>
