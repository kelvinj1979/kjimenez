
    <!-- About Section -->
    <section id="about" class="py-20 bg-background">
      <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
          <div class="lg:col-span-1 animate-on-scroll">
            <div class="sticky top-24">
              <h2 class="text-3xl font-bold mb-6">About Me</h2>
              <div class="relative overflow-hidden rounded-xl mb-6">
                <img src="<?php echo $portfolio["server"].$portfolio["photo"]; ?>" alt="<?php echo $portfolio["name"]; ?>" class="w-full aspect-square object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent"></div>
              </div>
              <p class="text-foreground/80 mb-6">
                
              <?php echo $portfolio["about_me"]; ?>

              </p>
              <a href="<?php echo $portfolio["resume"]; ?>" download class="btn btn-primary w-full">
                <i data-lucide="file-text" class="mr-2 h-4 w-4"></i> Download Resume
              </a>
            </div>
          </div>

          <div class="lg:col-span-2 space-y-12">
            <!-- Skills -->
           <!--  <div class="space-y-4 animate-on-scroll">
              <div class="flex items-center space-x-2">
                <i data-lucide="award" class="h-5 w-5 text-primary"></i>
                <h3 class="text-xl font-bold">Skills & Expertise</h3>
              </div>
              <div class="flex flex-wrap gap-2">
            <?php
              /*    $skills = json_decode($portfolio["skills"], true);
           
                foreach ($skills as $key => $value) {
                  echo '<span class="skill-item">'.$value.'</span>';
                }  */             

              ?>
                
              </div>
            </div> -->
            <div class="space-y-8 animate-on-scroll">
                <div class="flex items-center space-x-2">
                    <i data-lucide="award" class="h-6 w-6 text-primary"></i>
                    <h3 class="text-2xl font-bold">Skills & Expertise</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php
                    $categories = [
                        "Data Engineering & Cloud" => [
                            "Snowflake", "AWS (S3, Lambda, Athena, EC2)", "Apache Airflow", 
                            "Docker", "Python (Pandas)", "ETL Pipelines", "Data Modeling"
                        ],
                        "Database Administration (Expert)" => [
                            "Oracle (8i-12c)", "MS SQL Server", "MySQL", "PL/SQL", 
                            "T-SQL", "Performance Tuning", "Stored Procedures"
                        ],
                        "BI & Data Visualization" => [
                            "PowerBI", "Tableau", "Pentaho", "Crystal Reports", 
                            "Business Objects", "KPI Dashboards"
                        ],
                        "Full-Stack Development" => [
                            "PHP", "Laravel", "JavaScript", "React", 
                            ".Net Core", "Java", "REST APIs", "Git"
                        ]
                    ];

                    foreach ($categories as $title => $items): ?>
                        <div class="bg-gray-800/50 p-5 rounded-lg border border-gray-700">
                            <h4 class="text-primary font-bold mb-3 flex items-center">
                                <span class="w-2 h-2 bg-primary rounded-full mr-2"></span>
                                <?php echo $title; ?>
                            </h4>
                            <div class="flex flex-wrap gap-2">
                                <?php foreach ($items as $item): ?>
                                    <span class="skill-item bg-gray-700 text-gray-200 px-3 py-1 rounded-full text-sm border border-gray-600 hover:border-primary transition-colors">
                                        <?php echo $item; ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Experience -->
            <div class="space-y-4 animate-on-scroll">
              <div class="flex items-center space-x-2">
                <i data-lucide="briefcase" class="h-5 w-5 text-primary"></i>
                <h3 class="text-xl font-bold">Work Experience</h3>
              </div>
              <div class="space-y-6">

              <?php foreach ($experience as $key => $value): ?>

                <div class="relative pl-6 border-l border-border">
                  <div class="absolute right-0 top-0 transform translate-x-full h-3 w-3 rounded-full bg-primary"></div>
                  <div class="space-y-1">
                    <h4 class="text-lg font-semibold"><?php echo $value["experience"]; ?></h4>
                    <div class="flex items-center text-sm text-foreground/70">
                      <span><?php echo $value["company"]; ?></span>
                      <span class="mx-2">•</span>
                      <span><?php echo $value["start_date"].' - '.$value["end_date"]; ?></span>
                    </div>
                    <p class="text-foreground/80"><?php echo $value["exp_detail"]; ?></p>
                  </div>
                </div>

              <?php endforeach ?>

              </div>
            </div>

            <!-- Education -->
            <div class="space-y-4 animate-on-scroll">
              <div class="flex items-center space-x-2">
                <i data-lucide="graduation-cap" class="h-5 w-5 text-primary"></i>
                <h3 class="text-xl font-bold">Education</h3>
              </div>
              <div class="space-y-6">

              <?php foreach ($education as $key => $value): ?>

                <div class="relative pl-6 border-l border-border">
                  <div class="absolute right-0 top-0 transform translate-x-full h-3 w-3 rounded-full bg-primary"></div>
                  <div class="space-y-1">
                    <h4 class="text-lg font-semibold"><?php echo $value["education"]; ?></h4>
                    <div class="flex items-center text-sm text-foreground/70">
                      <span><?php echo $value["institution"]; ?></span>
                      <span class="mx-2">•</span>
                      <span><?php echo $value["start_date"].' - '.$value["end_date"]; ?></span>
                    </div>
                    <p class="text-foreground/80"><?php echo $value["edu_detail"]; ?></p>
                  </div>
                </div>

              <?php endforeach ?>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
