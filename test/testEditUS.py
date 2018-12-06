import unittest
from webDriversOptions import chromeWebdriver
from webDriversOptions import waitURL
from webDriversOptions import browserRegister
from webDriversOptions import browserLogin
from webDriversOptions import browserLogout
from webDriversOptions import browserCreateProject
from webDriversOptions import browserDeleteProject
from consts import File
from consts import Xpath

class EditUS(unittest.TestCase):

    __PROJECT_NAME = "editus"
    __TEST_PROJECT_ENTRY = "//a[@id='backlog-editus']"
    US_ID_FIELD = "//input[@name='id']"
    __US_ID = "1"
    US_DESC_FIELD = "//input[@name='desc']"
    __US_DESC = "En tant que ... je souhaite ..."
    US_DIFF_FIELD = "//input[@name='diff']"
    __US_DIFF = "1"
    VALIDATE_US_BTN = "//input[@name='validate']"
    BACKLOG_PROJECT = "Backlog.php?projectname=editus"

    EDIT_US_BTN = "//a[@id='editeditus1']"
    EDIT_US_PAGE = "EditUserStory.php?projectname=editus&id=1"
    __US_DESC_2 = "faire quelque chose"
    __US_DIFF_2 = "2"
    

    def setUp(self):
        self.__chrome = chromeWebdriver()

    def testEdit(self):
        self.__chrome.get('http://php-apache:80')
        waitURL(self.__chrome, File.HOME_PAGE)
        self.assertIn(File.HOME_PAGE, self.__chrome.current_url)

        browserRegister(self.__chrome)
        browserLogin(self.__chrome)
        browserCreateProject(self.__chrome, self.__PROJECT_NAME)

        self.assertIn(File.PROJECT_LIST, self.__chrome.current_url)
        listHref = self.__chrome.find_element_by_xpath(self.__TEST_PROJECT_ENTRY)
        listHref.click()
        self.assertIn(File.BACKLOG, self.__chrome.current_url)

        addUSBtn = self.__chrome.find_element_by_xpath(Xpath.ADD_US_BTN)
        addUSBtn.click()
        self.assertIn(File.ADD_US, self.__chrome.current_url)

        usIdField = self.__chrome.find_element_by_xpath(self.US_ID_FIELD)
        usIdField.send_keys(self.__US_ID)

        usDescField = self.__chrome.find_element_by_xpath(self.US_DESC_FIELD)
        usDescField.send_keys(self.__US_DESC)

        usDiffField = self.__chrome.find_element_by_xpath(self.US_DIFF_FIELD)
        usDiffField.send_keys(self.__US_DIFF)
        
        submit = self.__chrome.find_element_by_xpath(self.VALIDATE_US_BTN)
        submit.click()
        waitURL(self.__chrome, self.BACKLOG_PROJECT)

        submit = self.__chrome.find_element_by_xpath(self.EDIT_US_BTN)
        submit.click()
        waitURL(self.__chrome, self.EDIT_US_PAGE)

        usDescField = self.__chrome.find_element_by_xpath(self.US_DESC_FIELD)
        usDescField.send_keys(self.__US_DESC_2)

        usDiffField = self.__chrome.find_element_by_xpath(self.US_DIFF_FIELD)
        usDiffField.send_keys(self.__US_DIFF_2)

        submit = self.__chrome.find_element_by_xpath(self.VALIDATE_US_BTN)
        submit.click()
        waitURL(self.__chrome, self.BACKLOG_PROJECT)

        self.__chrome.find_element_by_xpath(Xpath.HOME_BTN).click()
        waitURL(self.__chrome, File.HOME_PAGE)
        self.__chrome.find_element_by_xpath(Xpath.LIST_PROJECTS_BTN).click()
        waitURL(self.__chrome, File.PROJECT_LIST)
        browserDeleteProject(self.__chrome, self.__PROJECT_NAME)
        browserLogout(self.__chrome)

    def tearDown(self):
        self.__chrome.quit()

if __name__ == "__main__":
    unittest.main()
