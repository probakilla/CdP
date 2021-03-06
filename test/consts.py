""" Constant classes for tests """


class Xpath(object):
    """ Xpaths constants for elements in php files """
    # Clickabls
    REGISTER_BTN = "//a[@id='register']"
    HOME_BTN = "//a[@id='home-btn']"
    LOGIN_BTN = "//a[@id='login']"
    LOGOUT_BTN = "//input[@name='logout']"
    SUBMIT_LOGIN_BTN = "//input[@name='login-submit']"
    CREATE_PROJECT_BTN = "//a[@id='create-project']"
    SAVE_PROJECT_BTN = "//input[@name='save']"
    LIST_PROJECTS_BTN = "//a[@id='list-project']"
    ADD_US_BTN = "//a[@id='add-us']"

    # Fields
    UNAME_FIELD = "//input[@name='username']"
    PASSWD_FIELD = "//input[@name='password']"
    PROJECT_NAME_FIELD = "//input[@name='projectName']"


class File(object):
    """ File name constats """
    HOME_PAGE = "HomePage.php"
    CREATE_PROJECT = "CreateProject.php"
    PROJECT_LIST = "Projects.php"
    BACKLOG = "Backlog.php"
    REGISTER = "Register.php"
    LOGIN = "LogIn.php"
    ADD_US = "AddUserStory.php"
