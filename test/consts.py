class Xpath:
    # Clickabls
    REGISTER_BTN = "//a[@id='register']"
    HOME_BTN = "//a[@name='home-btn']"
    LOGIN_BTN = "//a[@id='login']"
    LOGOUT_BTN = "//input[@name='logout']"
    SUBMIT_LOGIN_BTN = "//input[@name='login-submit']"
    CREATE_PROJECT_BTN = "//a[@id='create-project']"
    SAVE_PROJECT_BTN = "//input[@name='save']"
    LIST_PROJECTS_BTN = "//a[@id='list-project']"

    # Fields
    UNAME_FIELD = "//input[@name='username']"
    PASSWD_FIELD = "//input[@name='password']"
    PROJECT_NAME_FIELD = "//input[@name='projectName']"

class File:
    HOME_PAGE = "HomePage.php"
    CREATE_PROJECT = "CreateProject.php"
    PROJECT_LIST = "Projects.php"
    BACKLOG = "Backlog.php"