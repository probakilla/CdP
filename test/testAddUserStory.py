import unittest
from selenium import webdriver
from webDriversOptions import chromeWebdriver
from webDriversOptions import waitURL
from webDriversOptions import browserRegister
from webDriversOptions import browserLogin
from webDriversOptions import browserLogout
from webDriversOptions import browserCreateProject
from webDriversOptions import browserDeleteProject
from consts import File
from consts import Xpath

class addUserStory(unittest.TestCase):

    __PROJECT_NAME = "projet_addus_test"
    __TEST_PROJECT_ENTRY = "//a[@id='backlog-projet_addus_test']"

    def setUp(self):
        self.__chrome = chromeWebdriver()

    def test_us(self, ):
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

        self.__chrome.find_element_by_xpath(Xpath.ADDUS_BTN).click()
        waitURL(self.__chrome, File.ADDUS)

        _fillUserStoryFields(self.__chrome)
        waitURL(self.__chrome, File.BACKLOG)
        
        # Suppression du projet
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
