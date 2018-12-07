""" End 2 end test for AddUser.php """

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


class AddUS(unittest.TestCase):
    """ Unit testing class for the test of the add user """
    __PROJECT_NAME = "addus"
    __TEST_PROJECT_ENTRY = "//a[@id='backlog-addus']"
    US_ID_FIELD = "//input[@name='id']"
    __US_ID = "1"
    US_DESC_FIELD = "//input[@name='desc']"
    __US_DESC = "En tant que ... je souhaite ..."
    US_DIFF_FIELD = "//input[@name='diff']"
    __US_DIFF = "1"
    VALIDATE_US_BTN = "//input[@name='validate']"
    BACKLOG_PROJECT = "Backlog.php?projectname=addus"

    def setUp(self):
        self.chrome = chromeWebdriver()

    def testAdd(self):
        """
        Add a user to the database
        """
        self.chrome.get('http://php-apache:80')
        waitURL(self.chrome, File.HOME_PAGE)
        self.assertIn(File.HOME_PAGE, self.chrome.current_url)

        browserRegister(self.chrome)
        browserLogin(self.chrome)
        browserCreateProject(self.chrome, self.__PROJECT_NAME)

        self.assertIn(File.PROJECT_LIST, self.chrome.current_url)
        listHref = self.chrome.find_element_by_xpath(
            self.__TEST_PROJECT_ENTRY)
        listHref.click()
        self.assertIn(File.BACKLOG, self.chrome.current_url)

        addUSBtn = self.chrome.find_element_by_xpath(Xpath.ADD_US_BTN)
        addUSBtn.click()
        self.assertIn(File.ADD_US, self.chrome.current_url)

        usIdField = self.chrome.find_element_by_xpath(self.US_ID_FIELD)
        usIdField.send_keys(self.__US_ID)

        usDescField = self.chrome.find_element_by_xpath(self.US_DESC_FIELD)
        usDescField.send_keys(self.__US_DESC)

        usDiffField = self.chrome.find_element_by_xpath(self.US_DIFF_FIELD)
        usDiffField.send_keys(self.__US_DIFF)

        submit = self.chrome.find_element_by_xpath(self.VALIDATE_US_BTN)
        submit.click()
        waitURL(self.chrome, self.BACKLOG_PROJECT)

        self.chrome.find_element_by_xpath(Xpath.HOME_BTN).click()
        waitURL(self.chrome, File.HOME_PAGE)
        self.chrome.find_element_by_xpath(Xpath.LIST_PROJECTS_BTN).click()
        waitURL(self.chrome, File.PROJECT_LIST)
        browserDeleteProject(self.chrome, self.__PROJECT_NAME)
        browserLogout(self.chrome)

    def tearDown(self):
        self.chrome.quit()


if __name__ == "__main__":
    unittest.main()
