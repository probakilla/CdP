import unittest
from selenium import webdriver
from webDriversOptions import waitURL
from webDriversOptions import browserRegister
from webDriversOptions import browserLogin
from webDriversOptions import browserLogout
from consts import File
from consts import Xpath

class listProjects(unittest.TestCase):

    def setUp(self):
        self.__chrome = chromeWebdriver()

    def testList(self, ):
        self.__chrome.get('http://php-apache:80')
        waitURL(self.__chrome, File.HOME_PAGE)
        self.assertIn(File.HOME_PAGE, self.__chrome.current_url)

        browserRegister(self.__chrome)
        browserLogin(self.__chrome)

        self.__chrome.find_element_by_xpath(Xpath.LIST_PROJECTS_BTN).click()
        waitURL(self.__chrome, File.PROJECT_LIST)
        self.assertIn(File.PROJECT_LIST, self.__chrome.current_url)

        browserLogout(self.__chrome)

    def tearDown(self):
        self.__chrome.quit()


if __name__ == "__main__":
    unittest.main()
